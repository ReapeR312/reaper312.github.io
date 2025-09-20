var videoWrap = $(".video-wrap");
function countDown(e) {
  let t = document.querySelector(e);
  (a = t.getAttribute("data-minutes")), (b = t.getAttribute("data-seconds"));
  var o = setInterval(function () {
    0 <= parseInt(a) &&
      -1 !== parseInt(b) &&
      (0 === parseInt(b) && 0 !== parseInt(a) && (a--, (b = 59)),
      (t.innerText = (10 > a ? "0" + a : a) + " " + (10 > b ? "0" + b : b)),
      0 === parseInt(b) &&
        0 === parseInt(a) &&
        (a--, (b = 0), (t.innerText = "00 00"), clearInterval(o)),
      b--);
  }, 1e3);
}
videoWrap.click(function () {
  $(this).find($(".video-cover")).css("display", "none"),
    $(this).find($("video"))[0].play();
}),
  $(".btn--submit").click(function () {
    countDown(".time"), $(".order").addClass("shown__");
  });
var resultWrapper = document.querySelector(".overlay"),
  wheel = document.querySelector(".prize-wheel");
$(".wheel__cursor").click(function () {
  wheel.classList.contains("rotated") ||
    (wheel.classList.add("spin"),
    setTimeout(function () {
      resultWrapper.style.display = "block";
    }, 8e3),
    wheel.classList.add("rotated"));
}),
  $(".close-popup, .btn-popup").click(function (e) {
    e.preventDefault(),
      $(".wheel__wrapper").slideUp(),
      $(".order").slideDown(),
      $(".overlay").fadeOut();
  });
