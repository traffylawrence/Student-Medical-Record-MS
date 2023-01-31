var getColor = function(text) {
  if (text === "Complete") return '#2D7538';
  if (text === "Pending") return '#f5c71a';
  if (text === "Incomplete") return '#FF4646';
  if (text === "Active now") return '#2D7538';
  if (text === "Offline now") return '#FF4646';
  return "";
};

  $('span').each(function(i, span) {
  var color = getColor($(span).html());
  $(span).css({
  "color": color
});
});
