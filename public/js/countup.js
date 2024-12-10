function countUp(elements) {
    elements.forEach(element => {
      const targetNumber = parseInt(element.textContent);
      let currentNumber = Math.max(targetNumber - 100, 0);
      const intervalId = setInterval(() => {
        currentNumber++;
        element.textContent = currentNumber;
        if (currentNumber >= targetNumber) {
          clearInterval(intervalId);
        }
      }, 10); // adjust the interval time to control the speed of the count up
    });
  }
  
  // usage
  const displayElements = document.querySelectorAll('.count-up');
  countUp(displayElements);