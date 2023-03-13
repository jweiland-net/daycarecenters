document.addEventListener('DOMContentLoaded', function () {
  let earliestAge = document.querySelector('#earliestAge');
  let latestAge = document.querySelector('#latestAge');
  let earliestOpeningTime = document.querySelector('#earliestOpeningTime');
  let latestOpeningTime = document.querySelector('#latestOpeningTime');

  function updateSlider(type, slider) {
    if (type === 'Age') {
      earliestAge.value = slider.from;
      latestAge.value = slider.to;
    } else {
      earliestOpeningTime.value = slider.from;
      latestOpeningTime.value = slider.to;
    }
  }

  function convertToHHMM (value) {
    let hrs = parseInt(value);
    let min = Math.round((parseFloat(value) - hrs) * 60);
    return str_padding(hrs) + ':' + str_padding(min);
  }

  function str_padding (value) {
    return String('00' + value).slice(-2);
  }

  ionRangeSlider('#ageSlider', {
    min: parseInt(earliestAge.getAttribute('data-min-value')),
    max: parseInt(latestAge.getAttribute('data-max-value')),
    from: parseInt(earliestAge.value),
    to: parseInt(latestAge.value),
    step: 1,
    skin: 'round',
    type: 'double',
    onChange: function (slider) {
      updateSlider('Age', slider)
    }
  });

  ionRangeSlider('#openingTimeSlider', {
    min: parseFloat(earliestOpeningTime.getAttribute('data-min-value')),
    max: parseFloat(latestOpeningTime.getAttribute('data-max-value')),
    from: parseFloat(earliestOpeningTime.value),
    to: parseFloat(latestOpeningTime.value),
    step: 0.25,
    skin: 'round',
    type: 'double',
    prettify: function (value) {
      return convertToHHMM(value);
    },
    onChange: function (slider) {
      updateSlider('OpeningTime', slider)
    }
  });
});
