
  window.onload = function () {
    document.getElementById("delete_")
        .addEventListener("click", () => {
          $('#exampleModal').modal("show");
        })
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