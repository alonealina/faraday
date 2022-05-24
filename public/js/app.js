function clickFormButton() {
  check1 = document.faraday_form.Check1.checked;
  check2 = document.faraday_form.Check2.checked;
  check3 = document.faraday_form.Check3.checked;
  if (check1 && check2 && check3) {
    document.forms.faraday_form.submit();
  }
}

let Radio1 = document.getElementById("Individual");
let Radio2 = document.getElementById("Corporate");
let Indi_div = document.getElementById('individual_div');
let Corp_div = document.getElementById('corporate_div');

Radio1.addEventListener("click", function () {
  Indi_div.hidden = false;
  Corp_div.hidden = true;
});

Radio2.addEventListener("click", function () {
  Indi_div.hidden = true;
  Corp_div.hidden = false;
});

function nextfeild(str) {
  if (str.value.length >= str.maxLength) {
    for (var i = 0, elm = str.form.elements; i < elm.length; i++) {
      if (elm[i] == str) {
        (elm[i + 1] || elm[0]).focus();
        break;
      }
    }
  }
  return (str);
}