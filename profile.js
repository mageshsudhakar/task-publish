function submitForm()
{
  var name = $('input[name=name]').val();
  var phone = $('input[name=phone]').val();
  var email = $('input[name=email]').val();
  var college = $('input[name=college]').val();
  var course = $('input[name=course]').val();
  var yop = $('input[name=yop]').val();
  var areaOfIntrest = $('input[name=areaOfIntrest]').val();

  if(name != '' && phone!= '' && email != '')
  {
    var formData = {name: name, phone: phone, email: email,college:college, course:course, yop:yop, areaOfIntrest:areaOfIntrest};
    $('#message').html('<span style="color: red">Processing form. . . please wait. . .</span>');
    $.ajax({url: "profile.php", type: 'POST', data: formData, success: function(response)
    {
      var res = JSON.parse(response);
      console.log(res);
      if(res.success == true)
        $('#message').html('<span style="color: green">Form submitted successfully</span>');
      else
        $('#message').html('<span style="color: red">Form not submitted. Some error in running the database query.</span>');
    }
    });
  }
  else
  {
    $('#message').html('<span style="color: red">Please fill all the fields</span>');
  }
}
