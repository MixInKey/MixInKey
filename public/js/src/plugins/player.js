var canvas = document.getElementById("bg");
var context = canvas.getContext("2d");

var cover_sml = "data:image/jpeg;base64,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";

var canvasBG = new Image();

var drawBlur = function(wf) {
  var w = canvas.width;
  var h = canvas.height;
  context.drawImage(canvasBG, -w / wf, -h / 2, w * 2, h * 2);
}

canvasBG.onload = function() {
  drawBlur(1);
}

$(".player").hover(function() {
  $(".ui-slider-handle").animate({
    width: 10,
    height: 10,
    marginTop: 2
  }, 200);
  $(".ui-slider").css({
    height: 4
  });
  $(".ui-slider").animate({
    opacity: 1
  }, 200);
}, function() {
  $(".ui-slider-handle").animate({
    width: 2,
    height: 2,
    marginTop: 5
  }, 150);
  $(".ui-slider").css({
    height: 2
  });
  $(".ui-slider").animate({
    opacity: .5
  }, 200);
})

//
var playing = {
    song: "Twilight",
    artist: "Paradise",
    album: ""
  }
  //

function timeConvert(s) {
  var h = Math.floor(s / 3600);
  s -= h * 3600;
  var m = Math.floor(s / 60);
  s -= m * 60;
  return (m < 10 ? '0' + m : m) + ":" + (s < 10 ? '0' + s : s);
}

$("#cover").attr("src", cover_sml);

var audio = document.getElementById("audio");

audio.load();

$(".pause").click(function() {
  $(this).animate({
    top: 10,
    opacity: 0
  }, 150, function() {
    if ($(this).hasClass("fa-pause") == true) {
      $(this).css("top", "30px").removeClass("fa-pause").addClass("fa-play");
      audio.pause();
    } else {
      $(this).css("top", "30px").removeClass("fa-play").addClass("fa-pause");
      audio.play();
    }
  }).animate({
    top: 20,
    opacity: 1
  }, 350)
})

var dur;

audio.ondurationchange = function() {
  dur = Math.round(audio.duration);
  $(".dur").text(timeConvert(dur))
  $(".song").text(
    playing.song + " – " + playing.artist
  )

  $(".progress").slider({
    "min": 0,
    "max": dur,
    "animate": "fast",
    slide: function() {
      audio.currentTime = $(this).slider("value");
    }
  });
}

$(".volume").slider({
  min: 0,
  max: 100,
  value: 100,
  step: 2,
  animate: "fast",
  slide: function() {
    var val = $(this).slider("value");
    audio.volume = val / 100;
    $(".vol").fadeIn(100).text(val + "%");
    $(".controls").fadeOut(50);
  }
});

$(".volume").mouseout(function() {
  $(".vol").fadeOut(200);
  $(".controls").fadeIn(200);
});

audio.onplay = function() {
  setInterval(function() {

    var time = Math.floor(audio.currentTime);
    var wf = 1 + (2 / audio.duration * audio.currentTime);
    $(".time").text(timeConvert(time));
    $(".progress").slider("option", "value", time);
    drawBlur(wf);
  }, 100)
}

$(".progress").click(function() {
  audio.currentTime = $(this).slider("value");
  var time = Math.floor(audio.currentTime);
  $(".time").text(timeConvert(time))
})

$(".fa-fast-backward").click(function() {
  audio.currentTime = 0;
  $(".progress").slider("option", "value", 0)
})

$(".fa-repeat").click(function() {
  $(this).toggleClass("inactive")
  if (audio.loop) {
    audio.loop = false
  } else {
    audio.loop = true
  };
})

$(".fa-random").click(function() {
  $(this).toggleClass("inactive");
})
