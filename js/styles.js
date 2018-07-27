//SlideNavbar
$(document).ready(function() {
    $('.slide-nav').click(
        function(){
            $('.slideNavbar').removeClass('hide').delay(50).queue(function() {
                $(this).addClass("fadeIn").dequeue();
                $('body').css('position','fixed');
            });
        });

    $('.slideNavbar .close-btn').click(
        function(){
            $('.slideNavbar').removeClass("fadeIn").delay(700).queue(function() {
                $(this).addClass("hide").dequeue();
                $('body').css('position','static');
            });
        });

});
//End Of Slide Navbar

//Sticky Navbar
var zero = 0;
$(document).ready(function(){
    $(window).on('scroll', function(){
        $('.navbar').toggleClass('hide', $(window).scrollTop()
        > zero);
        zero = $(window).scrollTop();
    })
})
//End of Sticky Navbar

//Google Map

function myMap() {

    var locations = [
        ['LINK @ AMK', 1.3864112, 103.8442081, 3],
        ['Thong Lee Tradings', 1.3854138, 103.8433127, 2],
        ['Ken-Pal (S) Pte Ltd', 1.3866394, 103.8441781, 1]
    ];

    var mapProp= {
        center:new google.maps.LatLng(1.3864112,103.8442081),
        zoom: 17
    };
    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

//    var marker = new google.maps.Marker({
//        position: {lat: 1.3864112, lng: 103.8442081},
//        map: map
//    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));

    }

}

//End of Google Map



//Form Validation
function validation() {
    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone-no").value;
    var email = document.getElementById("email").value;
    var emailReg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var phoneReg = /^[0-9\s]*$/;
    if (phone === '') {
        $('#phone-no').addClass('control-error');
    } else {
        $('#phone-no').removeClass('control-error');
        if (!(phone).match(phoneReg)) {
            $('#phone-no').addClass('control-error');
        } else {
            $('#phone-no').removeClass('control-error');
        }

    }
    if (email === '') {
        $('#email').addClass('control-error');
    } else {
        $('#email').removeClass('control-error');
    }
    if (name === '') {
        $('#name').addClass('control-error');
    } else {
        $('#name').removeClass('control-error');
    }


    if (!(email).match(emailReg)) {
        $('#email').addClass('control-error');
    } else {
        $('#email').removeClass('control-error');
    }

    var labelValues = $(':checkbox:checked').map(function() {
        return [$(this).next('label').text(), this.value];
    }).get();

    //var checkedValue = null;
    //var inputElements = document.getElementsByClassName('timeslot');
    //for(var i=0; inputElements[i]; ++i){
    //  if(inputElements[i].checked){
    //      checkedValue = inputElements[i].value;
    //       break;
    //  }
    //}

    //var checkedValue2 = $('.timeslot:checked').val();

    if (!(name === '' || email === '' || name === '') && (phone).match(phoneReg) && (email).match(emailReg)) {
        emailjs.send("gmail", "template_wTEulVT7", {
            from_name: name,
            phone_no: phone,
            email: email,
            pref: labelValues
        });
        var x = document.getElementById("success");
        var y = document.getElementById("form-holder");
        x.style.display = "block";
        y.style.display = "none";
        $('#form-container').removeClass('bg-color1');
        $('#form-container').removeClass('bg-white');
    }
}

function validateindexform() {
    var name = document.getElementById("name").value;
    var phoneindex = document.getElementById("phone-no-index").value;
    var email = document.getElementById("email").value;
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;

    var emailReg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var phoneReg = /^[0-9\s]*$/;
    if (name === '') {
        $('#name').addClass('control-error');
    } else {
        $('#name').removeClass('control-error');
    }
    if (subject === '') {
        $('#subject').addClass('control-error');
    } else {
        $('#subject').removeClass('control-error');
    }
    if (phoneindex === '') {
        $('#phone-no-index').addClass('control-error');
    } else {
        $('#phone-no-index').removeClass('control-error');
        if (!(phoneindex).match(phoneReg)) {
            $('#phone-no-index').addClass('control-error');
        } else {
            $('#phone-no-index').removeClass('control-error');
        }
    }
    if (email === '') {
        $('#email').addClass('control-error');
    } else {
        $('#email').removeClass('control-error');
    }
    if (message === '') {
        $('#message').addClass('control-error');
    } else {
        $('#message').removeClass('control-error');
    }


    if (!(email).match(emailReg)) {
        $('#email').addClass('control-error');
    } else {
        $('#email').removeClass('control-error');
    }

    if (!(name === '' || email === '' || name === '' || message === '') && (email).match(emailReg)) {
//        emailjs.send("gmail", "index_template", {
//            from_name: name,
//            phone_no: phoneindex,
//            email: email,
//            message: message
//        });
        var x = document.getElementById("success-index");
        var y = document.getElementById("form-index");
        var messagetitle = document.getElementById("message-title");
        x.style.display = "block";
        y.style.display = "none";
        messagetitle.style.display ="none";
    }
};

