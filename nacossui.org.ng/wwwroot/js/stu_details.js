var ex = false;
function openUpdate() {
    var f = document.getElementById("list_update");
    if (!ex) {
        list_update.style.display = "block";
        ex = true;
    } else {
        list_update.style.display = "none";
        ex = false;
    }
}

var pan = false;
function openInput() {
    var x = document.getElementById("form_file");
    if (!pan) {
        form_file.style.display = "block";
        pan = true;
    } else {
        form_file.style.display = "none";
        pan = false;
    }
}

var fob = false;
function changePassword() {
    var x = document.getElementById("form_password");
    if (!fob) {
        form_password.style.display = "block";
        fob = true;
    } else {
        form_password.style.display = "none";
        fob = false;
    }
}

var oob = false;
function changeInfo() {
    var x = document.getElementById("form_others");
    if (!oob) {
        form_others.style.display = "block";
        oob = true;
    } else {
        form_others.style.display = "none";
        oob = false;
    }
}

	$(function() {
  // attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles =  1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  //  watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = label;

          if( input.length ) {
              input.val(log);
          } 

      });
  });
  
});




