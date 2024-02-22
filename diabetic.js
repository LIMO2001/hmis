document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('diaryForm');
    const entriesContainer = document.getElementById('entries');
  
    form.addEventListener('submit', function(event) {
      event.preventDefault();
  
      const dayOfWeekInput = document.getElementById('dayOfWeek');
      const beforeEatingInput = document.getElementById('beforeEating');
      const afterEatingInput = document.getElementById('afterEating');
      const bedtimeInput = document.getElementById('bedtime');
  
      const dayOfWeek = dayOfWeekInput.value;
      const beforeEating = beforeEatingInput.value;
      const afterEating = afterEatingInput.value;
      const bedtime = bedtimeInput.value;
  
      if (dayOfWeek && beforeEating && afterEating && bedtime) {
        const entry = document.createElement('div');
        entry.classList.add('entry');
        entry.innerHTML = `
          <h2>${dayOfWeek}</h2>
          <p>Before Eating: ${beforeEating} mg/dL</p>
          <p>After Eating: ${afterEating} mg/dL</p>
          <p>Bedtime: ${bedtime} mg/dL</p>
        `;
        entriesContainer.appendChild(entry);
  
        dayOfWeekInput.value = '';
        beforeEatingInput.value = '';
        afterEatingInput.value = '';
        bedtimeInput.value = '';
      } else {
        alert('Please fill in all fields.');
      }
    });
  });
  