var element="<div class=' p-3 my-2' style='border: 2px solid gray'><div class='form-group'><label for='name'>Video Name</label><input type='text' class='form-control'  name='video_name[]' ></div><div class='form-group'><label for='note'>Video URL</label><input type='text' class='form-control'  name='video_url[]' ></div></div>"
function appendElement() {
    $("#inputfield").append(element);   // Append new elements
  }