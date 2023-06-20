for (let i = 1; i <= 10; i++) {
  if (i % 3 === 0 && i % 5 === 0) {
    console.log("Macan");
  } else if (i % 3 === 0) {
    console.log("Gajah");
  } else if (i % 5 === 0) {
    console.log("Monyet");
  } else {
    console.log(i);
  }
}
