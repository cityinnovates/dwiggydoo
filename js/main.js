// Document is ready
$(document).ready(function () {
  $('.login_pp_btn').attr('disabled', 'disabled');
  // Validate Email
  $('#email').keyup(function () {
    validateEmail();
  });
  function validateEmail() {
    const email =
      document.getElementById('email');
    email.addEventListener('blur', () => {
      let regex =
        /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
      let s = email.value;
      if (regex.test(s)) {
        email.classList.remove(
          'is-invalid');
        emailError = true;
        $('.login_pp_btn').removeAttr('disabled', 'disabled');
        $('#emailvalid').hide();
      }
      else {
        email.classList.add(
          'is-invalid');
        emailError = false;
        $('#emailvalid').show();
        $('.login_pp_btn').attr('disabled', 'disabled');
      }
    })
  }


  // Validate Password
  $('#passcheck').hide();
  $('#passcheck2').hide();
  $('#confirm-password2').hide();
  let passwordError = true;
  $('#password,#password2,#confirm-password').keyup(function () {
    validatePassword();
  });
  function validatePassword() {
    let passwrdValue =
      $('#password,#password2,#confirm-password').val();
    if (passwrdValue.length == '') {
      $('#passcheck').show();
      $('#passcheck2').show();
      $('#confirm-password2').show();
      passwordError = false;
      return false;
    }
    if ((passwrdValue.length < 3) ||
      (passwrdValue.length > 10)) {
      $('#passcheck,#passcheck2').show();
      $('#passcheck,#passcheck2').html
        ("length of your password must be between 3 and 10");
      $('#confirm-password2').html
        ("Please enter your right password");
      $('#passcheck').css("color", "red");
      $('#submitbtn').attr('disabled', 'disabled');
      $('.login_pp_btn').attr('disabled', 'disabled');
      passwordError = false;
      return false;
    } else {
      $('#passcheck,#passcheck2').hide();
      $('.login_pp_btn').removeAttr('disabled', 'disabled');
      $('#submitbtn').removeAttr('disabled', 'disabled');
    }
  }

  // Submit button
  $('#submitbtn').click(function () {
    validatePassword();
    validateEmail();
    if (
      (passwordError == true) &&
      (emailError == true)
    ) {
      return true;


    } else {
      return false;
    }

  });


});
// document.getElementById('readUrl').addEventListener('change', function(){
//   if (this.files[0] ) {
//     var picture = new FileReader();
//     picture.readAsDataURL(this.files[0]);
//     picture.addEventListener('load', function(event) {
//       document.getElementById('uploadedImage').setAttribute('src', event.target.result);
//       document.getElementById('uploadedImage').style.display = 'block';
//     });
//   }
// });
function initImageUpload(box) {
  let uploadField = box.querySelector('.image-upload');

  uploadField.addEventListener('change', getFile);

  function getFile(e) {
    let file = e.currentTarget.files[0];
    checkType(file);
  }

  function previewImage(file) {
    let thumb = box.querySelector('.js--image-preview'),
      reader = new FileReader();

    reader.onload = function () {
      thumb.style.backgroundImage = 'url(' + reader.result + ')';
    }
    reader.readAsDataURL(file);
    thumb.className += ' js--no-default';
  }

  function checkType(file) {
    let imageType = /image.*/;
    if (!file.type.match(imageType)) {
      throw 'Datei ist kein Bild';
    } else if (!file) {
      throw 'Kein Bild gewählt';
    } else {
      previewImage(file);
    }
  }

}

// initialize box-scope
var boxes = document.querySelectorAll('.box');

for (let i = 0; i < boxes.length; i++) {
  let box = boxes[i];
  initDropEffect(box);
  initImageUpload(box);
}



/// drop-effect
function initDropEffect(box) {
  let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;

  // get clickable area for drop effect
  area = box.querySelector('.js--image-preview');
  area.addEventListener('click', fireRipple);

  function fireRipple(e) {
    area = e.currentTarget
    // create drop
    if (!drop) {
      drop = document.createElement('span');
      drop.className = 'drop';
      this.appendChild(drop);
    }
    // reset animate class
    drop.className = 'drop';

    // calculate dimensions of area (longest side)
    areaWidth = getComputedStyle(this, null).getPropertyValue("width");
    areaHeight = getComputedStyle(this, null).getPropertyValue("height");
    maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

    // set drop dimensions to fill area
    drop.style.width = maxDistance + 'px';
    drop.style.height = maxDistance + 'px';

    // calculate dimensions of drop
    dropWidth = getComputedStyle(this, null).getPropertyValue("width");
    dropHeight = getComputedStyle(this, null).getPropertyValue("height");

    // calculate relative coordinates of click
    // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
    x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10) / 2);
    y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10) / 2) - 30;

    // position drop and animate
    drop.style.top = y + 'px';
    drop.style.left = x + 'px';
    drop.className += ' animate';
    e.stopPropagation();

  }
}

// // for next the element
// $('.next').click(function () {


//   if ($('.first:visible').next().length) {
//     $('.first:visible').next().show()
//     $('.first:visible').first().hide()
//     $("div.tabss").addClass("activaa");
//   }
//   // $("div.q1").addClass("activaa");
//   // $("button.q1").addClass("activaa");
//   if ($('.q22').css('display') == 'block') {

//     $("div.q1").removeClass("activaa");
//     $("button.q1").removeClass("activaa");
//     $("div.q3").removeClass("activaa");
//     $("button.q3").removeClass("activaa");
//     $("div.q4").removeClass("activaa");
//     $("button.q4").removeClass("activaa");
//     $("div.q2").addClass("activaa");
//     $("button.q2").addClass("activaa");
//   }

//   if ($('.q33').css('display') == 'block') {
//     $("div.q1").removeClass("activaa");
//     $("button.q1").removeClass("activaa");
//     $("div.q2").removeClass("activaa");
//     $("button.q2").removeClass("activaa");
//     $("div.q4").removeClass("activaa");
//     $("button.q4").removeClass("activaa");
//     $("div.q3").addClass("activaa");
//     $("button.q3").addClass("activaa");
//   }
//   if ($('.q44').css('display') == 'block') {
//     $("div.q1").removeClass("activaa");
//     $("button.q1").removeClass("activaa");
//     $("div.q2").removeClass("activaa");
//     $("button.q2").removeClass("activaa");
//     $("div.q3").removeClass("activaa");
//     $("button.q3").removeClass("activaa");
//     $("div.q4").addClass("activaa");
//     $("button.q4").addClass("activaa");
//   }

// })

// //for skip the element

// $('.next2').click(function () {
//   if ($('.first:visible').next().length) {
//     $('.first:visible').next().show()
//     $('.first:visible').first().hide()
//   }
//   if ($('.q22').css('display') == 'block') {

//     $("div.q1").removeClass("activaa");
//     $("button.q1").removeClass("activaa");
//     $("div.q3").removeClass("activaa");
//     $("button.q3").removeClass("activaa");
//     $("div.q4").removeClass("activaa");
//     $("button.q4").removeClass("activaa");
//     $("div.q2").addClass("activaa");
//     $("button.q2").addClass("activaa");
//   }

//   if ($('.q33').css('display') == 'block') {
//     $("div.q1").removeClass("activaa");
//     $("button.q1").removeClass("activaa");
//     $("div.q2").removeClass("activaa");
//     $("button.q2").removeClass("activaa");
//     $("div.q4").removeClass("activaa");
//     $("button.q4").removeClass("activaa");
//     $("div.q3").addClass("activaa");
//     $("button.q3").addClass("activaa");
//   }
//   if ($('.q44').css('display') == 'block') {
//     $("div.q1").removeClass("activaa");
//     $("button.q1").removeClass("activaa");
//     $("div.q2").removeClass("activaa");
//     $("button.q2").removeClass("activaa");
//     $("div.q3").removeClass("activaa");
//     $("button.q3").removeClass("activaa");
//     $("div.q4").addClass("activaa");
//     $("button.q4").addClass("activaa");
//   }

// })

// //for the question quiz side bar click

// function forqu1() {

//   var e1 = document.getElementById("que1")
//   var e2 = document.getElementById("que2")
//   var e3 = document.getElementById("que3")
//   var e4 = document.getElementById("que4")

//   e1.style.display = "block";
//   e2.style.display = "none";
//   e3.style.display = "none";
//   e4.style.display = "none";

//   if ($('.q11').css('display') == 'block') {
//     $("div.q1").addClass("activaa");
//     $("button.q1").addClass("activaa");
//     $("div.q2").removeClass("activaa");
//     $("button.q2").removeClass("activaa");
//     $("div.q3").removeClass("activaa");
//     $("button.q3").removeClass("activaa");
//     $("div.q4").removeClass("activaa");
//     $("button.q4").removeClass("activaa");
//   }



// }

// function forqu2() {

//   var e1 = document.getElementById("que1")
//   var e2 = document.getElementById("que2")
//   var e3 = document.getElementById("que3")
//   var e4 = document.getElementById("que4")

//   e1.style.display = "none";
//   e2.style.display = "block";
//   e3.style.display = "none";
//   e4.style.display = "none";

//   if ($('.q22').css('display') == 'block') {

//     $("div.q1").removeClass("activaa");
//     $("button.q1").removeClass("activaa");
//     $("div.q3").removeClass("activaa");
//     $("button.q3").removeClass("activaa");
//     $("div.q4").removeClass("activaa");
//     $("button.q4").removeClass("activaa");
//     $("div.q2").addClass("activaa");
//     $("button.q2").addClass("activaa");
//   }


// }

// function forqu3() {

//   var e1 = document.getElementById("que1")
//   var e2 = document.getElementById("que2")
//   var e3 = document.getElementById("que3")
//   var e4 = document.getElementById("que4")

//   e1.style.display = "none";
//   e2.style.display = "none";
//   e3.style.display = "block";
//   e4.style.display = "none";

//   if ($('.q33').css('display') == 'block') {
//     $("div.q1").removeClass("activaa");
//     $("button.q1").removeClass("activaa");
//     $("div.q2").removeClass("activaa");
//     $("button.q2").removeClass("activaa");
//     $("div.q4").removeClass("activaa");
//     $("button.q4").removeClass("activaa");
//     $("div.q3").addClass("activaa");
//     $("button.q3").addClass("activaa");
//   }



// }


// function forqu4() {

//   var e1 = document.getElementById("que1")
//   var e2 = document.getElementById("que2")
//   var e3 = document.getElementById("que3")
//   var e4 = document.getElementById("que4")

//   e1.style.display = "none";
//   e2.style.display = "none";
//   e3.style.display = "none";
//   e4.style.display = "block";
//   if ($('.q44').css('display') == 'block') {
//     $("div.q1").removeClass("activaa");
//     $("button.q1").removeClass("activaa");
//     $("div.q2").removeClass("activaa");
//     $("button.q2").removeClass("activaa");
//     $("div.q3").removeClass("activaa");
//     $("button.q3").removeClass("activaa");
//     $("div.q4").addClass("activaa");
//     $("button.q4").addClass("activaa");
//   }



// }

// $('.first').first().show()
// $(document).ready(function () {
//   var areaLabel = $('.anstab').attr('area-label');
// })




function nextforclo1() {

  document.getElementById("v-pills-profile-tab").click();

console.log("fnrun");
}

function nextforclo2() {

  document.getElementById("v-pills-messages-tab").click();
}


function nextforclo3() {

  document.getElementById('v-pills-settings-tab').click();

}


function prevforclo2() {

  document.getElementById("v-pills-home-tab").click();

}

function prevforclo3() {

  document.getElementById("v-pills-profile-tab").click();

}

function prevforclo4() {

  document.getElementById("v-pills-messages-tab").click();

}


// function foraddclass() {

//   var q11 = document.getElementsByClassName(".q11");
//   var q1 = document.getElementsByClassName(".q1");
//   var q22 = document.getElementsByClassName(".q22");
//   var q2 = document.getElementsByClassName(".q2");
//   var q33 = document.getElementsByClassName(".q33");
//   var q3 = document.getElementsByClassName(".q3");
//   var q44 = document.getElementsByClassName(".q44");
//   var q4 = document.getElementsByClassName(".q4");

//   if (q11.style.display == "block") {
//     alert("cj")
//     q1.classList.add("activaa");
//   }

// }

$('.panel-collapse').on('show.bs.collapse', function () {
  $(this).siblings('.panel-heading').addClass('active');
});

$('.panel-collapse').on('hide.bs.collapse', function () {
  $(this).siblings('.panel-heading').removeClass('active');
});



function mytabris() {

  var firsttab = document.getElementById("firsttab");
  var secondtab = document.getElementById("secondtab");
  var heading11 = document.getElementById("heading11");
  var secondhading = document.getElementById("heading22");
  firsttab.style.display = "block";
  secondtab.style.display = "none";
  secondhading.style.backgroundColor = "white";
  heading11.style.backgroundColor = "#F3735F";
  secondhading.style.color = "black";
  heading11.style.color = "white";



}

function mytabris2() {
  var firsttab = document.getElementById("firsttab");
  var secondtab = document.getElementById("secondtab");
  var heading11 = document.getElementById("heading11");
  var secondhading = document.getElementById("heading22");
  firsttab.style.display = "none";
  secondtab.style.display = "block";
  secondhading.style.backgroundColor = "#F3735F";
  heading11.style.backgroundColor = "white";
  secondhading.style.color = "white";
  heading11.style.color = "black";

}


var barCount = 60;
var initialDateStr = '01 Apr 2017 00:00 Z';

var ctx = document.getElementById('chart').getContext('2d');
ctx.canvas.width = 800;
ctx.canvas.height = 400;

var barData = getRandomData(initialDateStr, barCount);
function lineData() { return barData.map(d => { return { x: d.x, y: d.c } }) };

var chart = new Chart(ctx, {
  type: 'candlestick',
  data: {
    datasets: [{
      label: 'CHRT - a random curve',
      data: barData
    }]
  }
});

var getRandomInt = function (max) {
  return Math.floor(Math.random() * Math.floor(max));
};

function randomNumber(min, max) {
  return Math.random() * (max - min) + min;
}

function randomBar(date, lastClose) {
  var open = +randomNumber(lastClose * 0.95, lastClose * 1.05).toFixed(2);
  var close = +randomNumber(open * 0.95, open * 1.05).toFixed(2);
  var high = +randomNumber(Math.max(open, close), Math.max(open, close) * 1.1).toFixed(2);
  var low = +randomNumber(Math.min(open, close) * 0.9, Math.min(open, close)).toFixed(2);
  return {
    x: date.valueOf(),
    o: open,
    h: high,
    l: low,
    c: close
  };

}

function getRandomData(dateStr, count) {
  var date = luxon.DateTime.fromRFC2822(dateStr);
  var data = [randomBar(date, 30)];
  while (data.length < count) {
    date = date.plus({ days: 1 });
    if (date.weekday <= 5) {
      data.push(randomBar(date, data[data.length - 1].c));
    }
  }
  return data;
}

var update = function () {
  var dataset = chart.config.data.datasets[0];

  // put datas in chart
  // mixed charts
  var mixed = document.getElementById('mixed').value;
  if (mixed === 'true') {
    chart.config.data.datasets = [
      {
        label: 'CHRT - a random curve',
        data: barData
      },
      {
        label: 'Close price',
        type: 'line',
        data: lineData()
      }
    ]
  }
  // not mixed charts
  else {
    chart.config.data.datasets = [
      {
        label: 'CHRT - a random curve',
        data: barData
      }
    ]
  }

  chart.update();
};

document.getElementById('update').addEventListener('click', update);

document.getElementById('randomizeData').addEventListener('click', function () {
  barData = getRandomData(initialDateStr, barCount);
  update();
});


function formfortoogggle1() {

  var finall2 = document.getElementById("toogggle2")
  var finall1 = document.getElementById("toogggle1")
  //      var filees= document.getElementById("file")

  finall2.style.display = "block";
  finall1.style.display = "none";
  // filees.



}


function formfortoogggle2() {

  var finall2 = document.getElementById("toogggle2")
  var finall1 = document.getElementById("toogggle1")

  finall2.style.display = "none";
  finall1.style.display = "block";


}


function champ11() {
  var champ11 = document.getElementById("ddassa1");
  var champ22 = document.getElementById("ddassa2");
  var champ33 = document.getElementById("ddassa3");
  champ11.style.display = "block";
  champ22.style.display = "none";
  champ33.style.display = "none";
}

function champ22() {
  var champ11 = document.getElementById("ddassa1");
  var champ22 = document.getElementById("ddassa2");
  var champ33 = document.getElementById("ddassa3");
  champ11.style.display = "none";
  champ22.style.display = "block";
  champ33.style.display = "none";
}

function champ33() {
  var champ11 = document.getElementById("ddassa1");
  var champ22 = document.getElementById("ddassa2");
  var champ33 = document.getElementById("ddassa3");
  champ11.style.display = "none";
  champ22.style.display = "none";
  champ33.style.display = "block";
}
