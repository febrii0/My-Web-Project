const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

rl.question('Masukkan angka pertama: ', (num1) => {
  rl.question('Masukkan angka kedua: ', (num2) => {
    rl.question('Masukkan operator (+, -, *, /): ', (operator) => {
      let result;
      switch (operator) {
        case '+':
          result = parseFloat(num1) + parseFloat(num2);
          break;
        case '-':
          result = parseFloat(num1) - parseFloat(num2);
          break;
        case '*':
          result = parseFloat(num1) * parseFloat(num2);
          break;
        case '/':
          result = parseFloat(num1) / parseFloat(num2);
          break;
        default:
          console.log('Operator tidak valid. Silakan masukkan operator yang benar (+, -, *, /).');
          rl.close();
          return;
      }
      console.log(`Hasil: ${result}`);
      rl.close();
    });
  });
});
