var Ex_counter = 1;
var Ex_counter2 = 0;
var tot_ext = document.getElementById("ext_members").value;

var Dp_counter = 1;
var Dp_counter2 = 0;

var Pr_counter = 1;
var Pr_counter2 = 0;



(function($) {
  'use strict';
  $(function() {
    var todoListItem = $('.todo-list');
    var todoListInput = $('.todo-list-input');
    $('.todo-list-add-btn').on("click", function(event) {
      event.preventDefault();

      var item = $(this).prevAll('.todo-list-input').val();

      if (item) {
        todoListItem.append("<li><div class='form-check'><label class='form-check-label'><input class='checkbox' type='checkbox'/>" + item + "<i class='input-helper'></i></label></div><i class='remove fa fa-times-circle'></i></li>");
        todoListInput.val("");
      }

    });

    todoListItem.on('change', '.checkbox', function() {
      if ($(this).attr('checked')) {
        $(this).removeAttr('checked');
      } else {
        $(this).attr('checked', 'checked');
      }

      $(this).closest("li").toggleClass('completed');

    });

    todoListItem.on('click', '.remove', function() {
      $(this).parent().remove();
    });

  });
})(jQuery);




































































































































































































































































document.querySelector('#product_add_ben').addEventListener('change', function(){
  if(document.getElementById("product_add_ben").value != ""){
    document.getElementById("p_ben").style.display = "block";
    
    document.getElementById("display_").innerHTML = '1 of ' + document.getElementById("product_add_ben").value;

  }else {
    document.getElementById("p_ben").style.display = "none";
  }
})
document.querySelector('#Benefits_btn').addEventListener('click', function(){
  var msg = "";
  const display = document.getElementById('err_msg');
  if(document.getElementById("Product_Additonal_Benefits").value === "" || document.getElementById("Name_of_Benefits").value === ""){
     msg = "Please fill all required fields for Product benefits Details";
     display.innerHTML = msg;
  $('#validator_msg').modal("show");
  }else{
       
  Pr_counter = Pr_counter + 1;
  Pr_counter2 = Pr_counter2 + 1;
  
  if(Pr_counter2 == document.getElementById("product_add_ben").value){
    if(document.getElementById("product_add_ben").value == 1){
      $(document).ready(function(){
        $.ajax({
            url:'n4.php',
            type:'post',
            data:{names:$('#names').val(), Surname:$('#Surname').val(),Name_of_Benefits:$('#Name_of_Benefits').val(), 
                  Product_Additonal_Benefits:$('#Product_Additonal_Benefits').val(), 
                  policy_no:$('#policy_no').val()
                },
            success:function(response){
                $('#ad_member_ad').html(response);
                document.getElementById("Name_of_Benefits").value = "";
                document.getElementById("Product_Additonal_Benefits").value = "";
                //alert("iyafika")
                //window.location.href = "/login.php";
            }
        });
});
      document.getElementById("p_ben").style.display = "none";
    }else {
      $(document).ready(function(){
        $.ajax({
            url:'n4.php',
            type:'post',
            data:{names:$('#names').val(), Surname:$('#Surname').val(),Name_of_Benefits:$('#Name_of_Benefits').val(), 
                  Product_Additonal_Benefits:$('#Product_Additonal_Benefits').val(), 
                  policy_no:$('#policy_no').val()
                },
            success:function(response){
                $('#ad_member_ad').html(response);
                document.getElementById("Name_of_Benefits").value = "";
                document.getElementById("Product_Additonal_Benefits").value = "";
                //alert("iyafika")
                //window.location.href = "/login.php";
            }
        });
});
      document.getElementById("p_ben").style.display = "none";
    }
  }else {
    $(document).ready(function(){
      $.ajax({
          url:'n4.php',
          type:'post',
          data:{names:$('#names').val(), Surname:$('#Surname').val(),Name_of_Benefits:$('#Name_of_Benefits').val(), 
                Product_Additonal_Benefits:$('#Product_Additonal_Benefits').val(), 
                policy_no:$('#policy_no').val()
              },
          success:function(response){
              $('#ad_member_ad').html(response);
              document.getElementById("Name_of_Benefits").value = "";
              document.getElementById("Product_Additonal_Benefits").value = "";
              //alert("iyafika")
              //window.location.href = "/login.php";
          }
      });
});
    document.getElementById("display_").innerHTML = Pr_counter + ' of ' + document.getElementById("product_add_ben").value;
  }
  }
})


document.querySelector('#Dep_covered').addEventListener('change', function(){
  if(document.getElementById("Dep_covered").value != ""){
    document.getElementById("d_m").style.display = "block";
    
    document.getElementById("display_1").innerHTML = '1 of ' + document.getElementById("Dep_covered").value;

  }else {
    document.getElementById("d_m").style.display = "none";
  }
})

document.querySelector('#de_btn').addEventListener('click', function(){

var msg = "";
const display = document.getElementById('err_msg');
if(document.getElementById("de_Name").value === "" || document.getElementById("de_Surname").value === "" || document.getElementById("de_ContactNo").value === "" || document.getElementById("de_idNumber").value === ""
  || document.getElementById("deRelationship").value === "" || document.getElementById("de_Nationality").value === "" || document.getElementById("de_Gender").value === "" || document.getElementById("policy_no").value === ""){
   msg = "Please fill all required fields details for dependent member";
   display.innerHTML = msg;
$('#validator_msg').modal("show");
}else{

  Dp_counter = Dp_counter + 1;
  Dp_counter2 = Dp_counter2 + 1;
  
  if(Dp_counter2 == document.getElementById("Dep_covered").value){
    if(document.getElementById("Dep_covered").value == 1){
      $(document).ready(function(){
        $.ajax({
            url:'n3.php',
            type:'post',
            data:{names:$('#names').val(), Surname:$('#Surname').val(),de_Name:$('#de_Name').val(), 
                  de_Surname:$('#de_Surname').val(), 
                  de_ContactNo:$('#de_ContactNo').val(), 
                  de_idNumber:$('#de_idNumber').val(), 
                  deRelationship:$('#deRelationship').val(), 
                  de_Nationality:$('#de_Nationality').val(), 
                  de_Gender:$('#de_Gender').val(),
                  policy_no:$('#policy_no').val()
                },
            success:function(response){
                $('#ad_member_ad').html(response);
                document.getElementById("de_Name").value = "";
                document.getElementById("de_Surname").value = "";
                document.getElementById("de_ContactNo").value = "";
                document.getElementById("de_idNumber").value = "";
                $('#deRelationship option').prop('selected', function() {return this.defaultSelected;});
                $('#de_Nationality option').prop('selected', function() {return this.defaultSelected;});
                $('#de_Gender option').prop('selected', function() {return this.defaultSelected;});
                //alert("iyafika")
                //window.location.href = "/login.php";
            }
        });
});
      document.getElementById("d_m").style.display = "none";
    }else {
      $(document).ready(function(){
        $.ajax({
            url:'n3.php',
            type:'post',
            data:{names:$('#names').val(), Surname:$('#Surname').val(),de_Name:$('#de_Name').val(), 
                  de_Surname:$('#de_Surname').val(), 
                  de_ContactNo:$('#de_ContactNo').val(), 
                  de_idNumber:$('#de_idNumber').val(), 
                  deRelationship:$('#deRelationship').val(), 
                  de_Nationality:$('#de_Nationality').val(), 
                  de_Gender:$('#de_Gender').val(),
                  policy_no:$('#policy_no').val()
                },
            success:function(response){
                $('#ad_member_ad').html(response);
                document.getElementById("de_Name").value = "";
                document.getElementById("de_Surname").value = "";
                document.getElementById("de_ContactNo").value = "";
                document.getElementById("de_idNumber").value = "";
                $('#deRelationship option').prop('selected', function() {return this.defaultSelected;});
                $('#de_Nationality option').prop('selected', function() {return this.defaultSelected;});
                $('#de_Gender option').prop('selected', function() {return this.defaultSelected;});
                //alert("iyafika")
                //window.location.href = "/login.php";
            }
        });
});
      document.getElementById("d_m").style.display = "none";
    }
  }else {
    $(document).ready(function(){
      $.ajax({
          url:'n3.php',
          type:'post',
          data:{names:$('#names').val(), Surname:$('#Surname').val(),de_Name:$('#de_Name').val(), 
                de_Surname:$('#de_Surname').val(), 
                de_ContactNo:$('#de_ContactNo').val(), 
                de_idNumber:$('#de_idNumber').val(), 
                deRelationship:$('#deRelationship').val(), 
                de_Nationality:$('#de_Nationality').val(), 
                de_Gender:$('#de_Gender').val(),
                policy_no:$('#policy_no').val()
              },
          success:function(response){
              $('#ad_member_ad').html(response);
              document.getElementById("de_Name").value = "";
              document.getElementById("de_Surname").value = "";
              document.getElementById("de_ContactNo").value = "";
              document.getElementById("de_idNumber").value = "";
              $('#deRelationship option').prop('selected', function() {return this.defaultSelected;});
              $('#de_Nationality option').prop('selected', function() {return this.defaultSelected;});
              $('#de_Gender option').prop('selected', function() {return this.defaultSelected;});
              //alert("iyafika")
              //window.location.href = "/login.php";
          }
      });
});
    document.getElementById("display_1").innerHTML = Dp_counter + ' of ' + document.getElementById("Dep_covered").value;
  }
}
})


document.querySelector('#ext_members').addEventListener('change', function(){
  if(document.getElementById("ext_members").value != ""){
    document.getElementById("Ex_m").style.display = "block";
    
    document.getElementById("display_2").innerHTML = '1 of ' + document.getElementById("ext_members").value;

  }else {
    document.getElementById("Ex_m").style.display = "none";
  }
})
document.querySelector('#Ex_btn').addEventListener('click', function(){
  var msg = "";
const display = document.getElementById('err_msg');
if(document.getElementById("Ex_Name").value === "" || document.getElementById("Ex_Surname").value === "" || document.getElementById("Ex_ContactNo").value === ""
|| document.getElementById("Ex_idNumber").value === "" || document.getElementById("Ex_Nationality").value === "" || document.getElementById("Ex_Gender").value === "" || document.getElementById("ext_members").value === "" || document.getElementById("policy_no").value === ""){
   msg = "Please fill all required fields extended member Details";
   display.innerHTML = msg;
$('#validator_msg').modal("show");
}else{
  
  Ex_counter = Ex_counter + 1;
  Ex_counter2 = Ex_counter2 + 1;
  
  if(Ex_counter2 == document.getElementById("ext_members").value){
    if(document.getElementById("ext_members").value == 1){
      $(document).ready(function(){
        $.ajax({
            url:'n2.php',
            type:'post',
            data:{names:$('#names').val(), Surname:$('#Surname').val(),Ex_Name:$('#Ex_Name').val(), 
                  Ex_Surname:$('#Ex_Surname').val(), 
                  Ex_ContactNo:$('#Ex_ContactNo').val(), 
                  Ex_idNumber:$('#Ex_idNumber').val(), 
                  Ex_Nationality:$('#Ex_Nationality').val(), 
                  Ex_Gender:$('#Ex_Gender').val(),
                  ext_members:$('#ext_members').val(),  
                  policy_no:$('#policy_no').val()
                },
            success:function(response){
                $('#ad_member_ad').html(response);
                document.getElementById("Ex_Name").value = "";
                document.getElementById("Ex_Surname").value = "";
                document.getElementById("Ex_ContactNo").value = "";
                document.getElementById("Ex_idNumber").value = "";
                $('#Ex_Nationality option').prop('selected', function() {return this.defaultSelected;});
                $('#Ex_Gender option').prop('selected', function() {return this.defaultSelected;});
                $('#Ex_Relationship option').prop('selected', function() {return this.defaultSelected;});
                //alert("Thank you! " + document.getElementById("Ex_Name").value + " " + document.getElementById("Ex_Surname").value + " is saved successfully to our database as your extended member");
                //window.location.href = "/login.php";
            }
        });
});
      document.getElementById("Ex_m").style.display = "none";
    }else {
      $(document).ready(function(){
        $.ajax({
            url:'n2.php',
            type:'post',
            data:{names:$('#names').val(), Surname:$('#Surname').val(),Ex_Name:$('#Ex_Name').val(), 
                  Ex_Surname:$('#Ex_Surname').val(), 
                  Ex_ContactNo:$('#Ex_ContactNo').val(), 
                  Ex_idNumber:$('#Ex_idNumber').val(), 
                  Ex_Nationality:$('#Ex_Nationality').val(), 
                  Ex_Gender:$('#Ex_Gender').val(), 
                  ext_members:$('#ext_members').val(), 
                  policy_no:$('#policy_no').val()
                },
            success:function(response){
                $('#ad_member_ad').html(response);
                document.getElementById("Ex_Name").value = "";
                document.getElementById("Ex_Surname").value = "";
                document.getElementById("Ex_ContactNo").value = "";
                document.getElementById("Ex_idNumber").value = "";
                $('#Ex_Nationality option').prop('selected', function() {return this.defaultSelected;});
                $('#Ex_Gender option').prop('selected', function() {return this.defaultSelected;});
                $('#Ex_Relationship option').prop('selected', function() {return this.defaultSelected;});
                //alert("iyafika")
                //window.location.href = "/login.php";
            }
        });
});
      document.getElementById("Ex_m").style.display = "none";
    }
  }else {
    $(document).ready(function(){
      $.ajax({
          url:'n2.php',
          type:'post',
          data:{names:$('#names').val(), Surname:$('#Surname').val(),Ex_Name:$('#Ex_Name').val(), 
                Ex_Surname:$('#Ex_Surname').val(), 
                Ex_ContactNo:$('#Ex_ContactNo').val(), 
                Ex_idNumber:$('#Ex_idNumber').val(), 
                Ex_Nationality:$('#Ex_Nationality').val(), 
                Ex_Gender:$('#Ex_Gender').val(), 
                ext_members:$('#ext_members').val(), 
                policy_no:$('#policy_no').val()
              },
          success:function(response){
              $('#ad_member_ad').html(response);
              document.getElementById("Ex_Name").value = "";
              document.getElementById("Ex_Surname").value = "";
              document.getElementById("Ex_ContactNo").value = "";
              document.getElementById("Ex_idNumber").value = "";
              $('#Ex_Nationality option').prop('selected', function() {return this.defaultSelected;});
              $('#Ex_Gender option').prop('selected', function() {return this.defaultSelected;});
              $('#Ex_Relationship option').prop('selected', function() {return this.defaultSelected;});
              //alert("iyafika")
              //window.location.href = "/login.php";
          }
      });
});
    document.getElementById("display_2").innerHTML = Ex_counter + ' of ' + document.getElementById("ext_members").value;
  }
}
})

function ext_sub(){
        $(document).ready(function(){
            $.ajax({
                url:'n4.php',
                type:'post',
                data:{names:$('#names').val(), Surname:$('#Surname').val(),Name_of_Benefits:$('#Name_of_Benefits').val(), 
                      Product_Additonal_Benefits:$('#Product_Additonal_Benefits').val(), 
                      policy_no:$('#policy_no').val()
                    },
                success:function(response){
                    $('#ad_member_ad').html(response);
                    //alert("iyafika")
                    //window.location.href = "/login.php";
                }
            });
    });
}