function clickFormButton() {
    document.forms.faraday_form.submit();
}
function valueChange(event){
  Type = event.currentTarget.value;
  if (Type == '個人') {
    document.getElementById('individual_div').show();
  } else {
    document.getElementById('individual_div').hidden();
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