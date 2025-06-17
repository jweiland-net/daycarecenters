<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/daycarecenters.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Daycarecenters\Update;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Exception;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Attribute\UpgradeWizard;
use TYPO3\CMS\Install\Updates\UpgradeWizardInterface;

#[UpgradeWizard('daycarecentersFieldLogoMigration')]
class FieldLogoMigrationUpdate implements UpgradeWizardInterface, LoggerAwareInterface
{
    use LoggerAwareTrait;

    public function getTitle(): string
    {
        return '[daycarecenters] Migrate FAL relations where field name "logo" to "logos"';
    }

    public function getDescription(): string
    {
        return 'From version 6.0, the field "logo" was renamed to "logos".';
    }

    public function updateNecessary(): bool
    {
        return $this->getRecordsForMigration() > 0;
    }

    public function getPrerequisites(): array
    {
        return [];
    }

    public function executeUpdate(): bool
    {
        try {
            $this->migrateRecords();

            return true;
        } catch (\Exception $exception) {
            $this->logger->error('Migration failed: ' . $exception->getMessage());

            return false;
        }
    }

    /**
     * Retrieves records from the 'sys_file_reference' table based on specific criteria.
     * If $onlyCount is true, it returns the count of the records that match the criteria.
     * Otherwise, it returns an associative array of the matching records.
     *
     * @param bool $onlyCount If true, returns the count of matching records. If false, returns the matching records.
     * @return int|array The count of matching records if $onlyCount is true, or an associative array of records.
     * @throws \RuntimeException|Exception If there is a database query error.
     */
    protected function getRecordsForMigration(bool $onlyCount = true): int|array
    {
        $connectionPool = $this->getConnectionPool();
        $queryBuilder = $connectionPool->getQueryBuilderForTable('sys_file_reference');
        $queryBuilder->getRestrictions()->removeAll();

        try {
            // Build the base query
            $queryBuilder->from('sys_file_reference')
                ->orWhere(
                    $queryBuilder->expr()->eq(
                        'tablenames',
                        $queryBuilder->createNamedParameter('tx_daycarecenters_domain_model_kita', \PDO::PARAM_STR)
                    ),
                    $queryBuilder->expr()->eq(
                        'tablenames',
                        $queryBuilder->createNamedParameter('tx_daycarecenters_domain_model_holder', \PDO::PARAM_STR)
                    )
                )
                ->andWhere(
                    $queryBuilder->expr()->eq(
                        'fieldname',
                        $queryBuilder->createNamedParameter('logo', \PDO::PARAM_STR)
                    )
                );

            // Modify the query based on the $onlyCount parameter
            if ($onlyCount) {
                // Select the count of matching records
                $queryBuilder->count('uid');
                $result = $queryBuilder->executeQuery();

                return (int)$result->fetchOne();
            }

            // Select the required fields for matching records
            $queryBuilder->select('uid', 'fieldname', 'tablenames');
            $result = $queryBuilder->executeQuery();

            return $result->fetchAllAssociative();
        } catch (DBALException $dbalException) {
            throw new \RuntimeException('Database query failed. Error was: ' . $dbalException->getMessage(), 1596705829853, $dbalException);
        }
    }

    private function migrateRecords(): void
    {
        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable('sys_file_reference');
        $affectedRows = $queryBuilder
            ->update('sys_file_reference')
            ->set('fieldname', 'logos')
            ->where(
                $queryBuilder->expr()->eq(
                    'fieldname',
                    $queryBuilder->createNamedParameter('logo', \PDO::PARAM_STR)
                ),
                $queryBuilder->expr()->or(
                    $queryBuilder->expr()->eq(
                        'tablenames',
                        $queryBuilder->createNamedParameter('tx_daycarecenters_domain_model_kita', \PDO::PARAM_STR)
                    ),
                    $queryBuilder->expr()->eq(
                        'tablenames',
                        $queryBuilder->createNamedParameter('tx_daycarecenters_domain_model_holder', \PDO::PARAM_STR)
                    )
                )
            )
            ->executeStatement();

        $this->logger->notice(
            $affectedRows . 'Records with field name logo has been migrated to logos.'
        );
    }

    private function getConnectionPool(): ConnectionPool
    {
        return GeneralUtility::makeInstance(ConnectionPool::class);
    }
}
