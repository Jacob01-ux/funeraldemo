function myPrint{
            var printdata = document.getElementById(invoice);
            newwin= window.open("");
            newwin.document.write(printdata.outerHTML);
            newwin.print();
            newwin.close();
            
            } 
          
          
          