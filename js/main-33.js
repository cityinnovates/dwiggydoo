// Document is ready
$(document).ready(function () {
     $('.login_pp_btn').attr('disabled','disabled');
   // Validate Email
   $('#email').keyup(function () {
        validateEmail();
    });
   function validateEmail() {
    const email =
        document.getElementById('email');
    email.addEventListener('blur', ()=>{
       let regex =
       /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
       let s = email.value;
       if(regex.test(s)){
          email.classList.remove(
                'is-invalid');
          emailError = true;
          $('.login_pp_btn').removeAttr('disabled','disabled');
          $('#emailvalid').hide();
        }
        else{
            email.classList.add(
                  'is-invalid');
            emailError = false;
            $('#emailvalid').show();
            $('.login_pp_btn').attr('disabled','disabled');
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
        if ((passwrdValue.length < 3)||
            (passwrdValue.length > 10)) {
            $('#passcheck,#passcheck2').show();
            $('#passcheck,#passcheck2').html
            ("length of your password must be between 3 and 10");
            $('#confirm-password2').html
            ("Please enter your right password");
            $('#passcheck').css("color", "red");
            $('#submitbtn').attr('disabled','disabled');
            $('.login_pp_btn').attr('disabled','disabled');
            passwordError = false;
            return false;
        } else {
            $('#passcheck,#passcheck2').hide();
            $('.login_pp_btn').removeAttr('disabled','disabled');
            $('#submitbtn').removeAttr('disabled','disabled');
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

  function getFile(e){
    let file = e.currentTarget.files[0];
    checkType(file);
  }
  
  function previewImage(file){
    let thumb = box.querySelector('.js--image-preview'),
        reader = new FileReader();

    reader.onload = function() {
      thumb.style.backgroundImage = 'url(' + reader.result + ')';
    }
    reader.readAsDataURL(file);
    thumb.className += ' js--no-default';
  }

  function checkType(file){
    let imageType = /image.*/;
    if (!file.type.match(imageType)) {
      throw 'Datei ist kein Bild';
    } else if (!file){
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
function initDropEffect(box){
  let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;
  
  // get clickable area for drop effect
  area = box.querySelector('.js--image-preview');
  area.addEventListener('click', fireRipple);
  
  function fireRipple(e){
    area = e.currentTarget
    // create drop
    if(!drop){
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
    x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
    y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;
    
    // position drop and animate
    drop.style.top = y + 'px';
    drop.style.left = x + 'px';
    drop.className += ' animate';
    e.stopPropagation();
    
  }
}


$('.next').click(function() {
  if ($('.first:visible').next().length) {
    $('.first:visible').next().show()
    $('.first:visible').first().hide()
  }




})
$('.next2').click(function() {
  if ($('.first:visible').next().length) {
    $('.first:visible').next().show()
    $('.first:visible').first().hide()
  }




})



$('.first').first().show()
$(document).ready(function(){
  var areaLabel = $('.anstab').attr('area-label');
})



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
    function lineData() { return barData.map(d => { return { x: d.x, y: d.c} }) };
    
    var chart = new Chart(ctx, {
      type: 'candlestick',
      data: {
        datasets: [{
          label: 'CHRT - a random curve',
          data: barData
        }]
      }
    });
    
    var getRandomInt = function(max) {
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
        date = date.plus({days: 1});
        if (date.weekday <= 5) {
          data.push(randomBar(date, data[data.length - 1].c));
        }
      }
      return data;
    }
    
    var update = function() {
      var dataset = chart.config.data.datasets[0];
      
      // put datas in chart
      // mixed charts
      var mixed = document.getElementById('mixed').value;
      if(mixed === 'true') {
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
    
    document.getElementById('randomizeData').addEventListener('click', function() {
      barData = getRandomData(initialDateStr, barCount);
      update();
    });


