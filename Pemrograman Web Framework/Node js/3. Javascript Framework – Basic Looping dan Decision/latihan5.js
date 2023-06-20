let a = 10;
let b = 20;

if (a < 15) {
  if (b > 25) {
    console.log(a * (b - 15));
  } else if (b < 15) {
    console.log(a * (b + 15));
  } else {
    console.log(a * b);
  }
} else if (a > 15 && a < 25) {
  if (b > 25) {
    console.log(a + (b - 25));
  } else if (b < 15) {
    console.log(a + (b + 25));
  } else {
    console.log(a + b);
  }
} else {
  console.log("Nilai a diluar rentang yang ditentukan");
}
