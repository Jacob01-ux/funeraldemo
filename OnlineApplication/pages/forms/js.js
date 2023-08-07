
  window.onload = function () {
    document.getElementById("delete_")
        .addEventListener("click", () => {
          $('#exampleModal').modal("show");
        })
  }
function ac() {
    //alert("assss")
    $.ajax({
            url:'accept.php',
            type:'post',
            data:{Customer:$('#names').val(), idno:$('#idno').val(),phone:$('#phone1').val(),gender:$('#gender').val(),main_Nationality:$('#Nationality').val(),languages_:$('#languages_').val(),product:$('#product').val(),PremiumCoverAmount:$('#Premium').val(),policy_no:$('#PolicyNumber').val(),Dep_covered:$('#Dep_covered').val(),
              cat:$('#Group_Name').val(), Category:$('#Category').val(), status:$('#status').val(),email:$('#email').val(),res_address:$('#res_address').val(),product_add_ben:$('#product_add_ben').val(),ext_members:$('#ext_members').val(),m_status:$('#m_status').val(),inc_date:$('#inc_date').val(),Preferred_Payment_Date:$('#Preferred_Payment_Date').val(),period:$('#n_month').val(),_By:$('#admin').val()
                },
            success:function(response){
                $('#ad_member_ad').html(response);
                alert("Application accepted succesfully");
                window.location.href = "newClient.php";
            }
        });
  }
  function rj() {
    //alert("assss")
    $.ajax({
            url:'reject.php',
            type:'post',
            data:{Customer:$('#names').val(), idno:$('#idno').val(),phone:$('#phone1').val(),gender:$('#gender').val(),main_Nationality:$('#Nationality').val(),languages_:$('#languages_').val(),product:$('#product').val(),PremiumCoverAmount:$('#Premium').val(),policy_no:$('#PolicyNumber').val(),Dep_covered:$('#Dep_covered').val(),
              cat:$('#Group_Name').val(), Category:$('#Category').val(), status:$('#status').val(),email:$('#email').val(),res_address:$('#res_address').val(),product_add_ben:$('#product_add_ben').val(),ext_members:$('#ext_members').val(),m_status:$('#m_status').val(),inc_date:$('#inc_date').val(),Preferred_Payment_Date:$('#Preferred_Payment_Date').val(),period:$('#n_month').val(),_By:$('#admin').val()
                },
            success:function(response){
                $('#ad_member_ad').html(response);
                alert("Application rejected succesfully");
                location.reload();
            }
        });
  }

  window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("print-card-body");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'terms&conditions.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
  }
  window.onload = function () {
    document.getElementById("yes_")
        .addEventListener("click", () => {
          alert("processing")
          $.ajax({
            url:'doc-del.php',
            type:'post',
            data:{id:$('#admin').val()
                },
            success:function(response){
                $('#ad_member_ad').html(response);
                alert("iyafika")
                //window.location.href = "/login.php";
            }
        });
        })
  }
  // window.onload = function () {
  //   document.getElementById("delete_")
  //       .addEventListener("click", () => {
  //         $('#exampleModal').modal("show");
  //       })
  // }
  // function remove_file() {
  //   alert("can remove")
  // }