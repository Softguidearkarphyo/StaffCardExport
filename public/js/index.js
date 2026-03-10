function auto_change(id1,id2){
    var value = $( id1 ).val();
    $( id2 ).text( value );
}

function readURL(input,id) {
  if (input.files && input.files[0]) {

      $(id).attr( "style", "display: block !important;" );
      var reader = new FileReader();
      
      reader.onload = function (e) {
          $(id).attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]);

  }
}

// function download_card(){
//   //get the div content
//   div_content = document.querySelector(".staff_card");
//   //make it as html5 canvas
//   html2canvas(div_content,{ scale: 1 }).then(function(canvas) {
//     //$('#previewImage').append(canvas);
//     data = canvas.toDataURL('image/jpeg');

//       var link = document.createElement("a");
//       document.body.appendChild(link);
//       link.download = "staff_card.jpg";
//       link.href = data;
//       link.target = '_blank';
//       link.click();
//   });
// };


// function download_card() {
//   var div_content = document.querySelector(".staff_card");
//   html2canvas(div_content, { scale: 1  }).then(function(canvas) {
//     var data = canvas.toDataURL('image/jpeg', 1.0);
//     var link = document.createElement("a");
//     link.download = "staff_card.jpg";
//     link.href = data;
//     document.body.appendChild(link);
//     link.click();
//     document.body.removeChild(link);
//   });
// }
// function download_card() {
//   var div_content = document.querySelector(".staff_card");
//   html2canvas(div_content, { scale: 1 }).then(function(canvas) {
//     // Create a new canvas with the desired dimensions
//     var resizedCanvas = document.createElement("canvas");
//     var resizedContext = resizedCanvas.getContext("2d");
//     resizedCanvas.width = 300 * (canvas.width / 96); // Assuming 96 DPI, adjust as needed
//     resizedCanvas.height = 300 * (canvas.height / 96); // Assuming 96 DPI, adjust as needed

//     // Draw the original canvas onto the new canvas with the desired dimensions
//     resizedContext.drawImage(canvas, 0, 0, resizedCanvas.width, resizedCanvas.height);

//     // Convert the resized canvas to data URL with the desired JPEG quality
//     var resizedData = resizedCanvas.toDataURL('image/jpeg', 1.0);

//     // Create a link element to trigger the download
//     var link = document.createElement("a");
//     link.download = "staff_card.jpg";
//     link.href = resizedData;

//     // Append the link to the document body, trigger the click, and remove the link
//     document.body.appendChild(link);
//     link.click();
//     document.body.removeChild(link);
//   });
// }

function download_card() {
  var div_content = document.querySelector(".staff_card");
  html2canvas(div_content, { scale: 2 }).then(function(canvas) {
    var resizedCanvas = document.createElement("canvas");
    var resizedContext = resizedCanvas.getContext("2d");
    resizedCanvas.width = 555;
    resizedCanvas.height = 370;
    resizedContext.drawImage(canvas, 0, 0, 555, 370);
    var resizedData = resizedCanvas.toDataURL('image/jpeg', 1.0);
    var link = document.createElement("a");
    link.download = "staff_card.jpg";
    link.href = resizedData;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  });
}



function auto_change2(id1,id2){
  var value = $( id1 ).val();
  $( id2 ).text( value );
}

function readURL2(input,id) {
  if (input.files && input.files[0]) {

      $(id).attr( "style", "display: block !important;" );
      var reader = new FileReader();
      
      reader.onload = function (e) {
          $(id).attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]);

  }
}

// function download_card2(){
//   //get the div content
//   div_content = document.querySelector(".staff_card2");
//   //make it as html5 canvas
//   html2canvas(div_content).then(function(canvas) {
//     //$('#previewImage').append(canvas);
//     data = canvas.toDataURL('image/jpeg');

//       var link = document.createElement("a");
//       document.body.appendChild(link);
//       link.download = "staff_card8.jpg";
//       link.href = data;
//       link.target = '_blank';
//       link.click();
//   });
// };


function download_card2() {
  var div_content = document.querySelector(".staff_card2");
  html2canvas(div_content, { scale: 2 }).then(function(canvas) {
    var data = canvas.toDataURL('image/jpeg', 1.0);
    var link = document.createElement("a");
    link.download = "staff_card8.jpg";
    link.href = data;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  });
}




