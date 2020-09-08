<!-- categiry page -->
<html>
<head>
  <!-- CSS only -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">



</head>

<body>
  <!-- Button trigger modal -->
  <!-- for edit  -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
  Edit Modal
</button> -->
  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-sen="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="ind.php" method="POST">
            <input type="hidden" name="snoedit" id="snoedit">
            <label>
              <h1>Category Name</h1>
              <input id="cnameedit" name="cnameedit" type="text" placeholder="cname" />
            </label><br> <br>
            <button type="submit" class='edit btn btn-sm btn-primary'>update product</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <form action="ind.php" method="POST">
    <label>
      <h1>Category Name</h1>
      <input id="cname" name="cname" type="text" placeholder="cname" />
    </label><br> <br>
    <button type="submit" class='edit btn btn-sm btn-primary'> submit</button>
  </form>
  <div class="containar my-4">

    <table class="table table-bordered" id="myTable">
      <thead>
      <tbody>
        <tr>
          <th scope="col">srno</th>
          <th scope="col">category</th>
          <th scope="col">action</th>
        </tr>
      </thead>
      
        <?php
            $server = "localhost";
            $username = "root";
            $password = "";
            $database = "products";
        
            $con = mysqli_connect($server,$username,$password,$database);
            
            $sq1= "SELECT * FROM productsdet";
            // echo "$sq1";
            $result = mysqli_query($con, $sq1);
            $sno=0;
            while($row = mysqli_fetch_assoc($result)){
              $sno = $sno + 1;  
              echo" <tr>
              <th scope='row'>". $sno."</th>
              <td>". $row['cname']."</td>
              <td><button id=".$row['srno']." class='edit btn btn-sm btn-primary' >Edit</button> <button id=d".$row['srno']." class='delete btn btn-sm btn-primary' >Delete</button></td>
          </tr>";
            }
        ?>


      </tbody>
    </table>
  </div>
  <!-- JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <!-- <script src="jq.js"> </script>  -->
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>


  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script>
  <!-- javscripr for edit model -->
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((eLement) => {
      eLement.addEventListener("click", (e) => {
        console.log("edit",);
        tr = e.target.parentNode.parentNode;
        cname1 = tr.getElementsByTagName("td")[0].innerText;
        console.log(cname1);
        cnameedit.value = cname1;
        snoedit.value = e.target.id;
        console.log(e.target.id);
        $('#editModal').modal('toggle');


      })
    });
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((eLement) => {
      eLement.addEventListener("click", (e) => {
        console.log("edit",);
        tr = e.target.parentNode.parentNode;
        sno = e.target.id.substr(1,)
        if (confirm("confirm you want to delete!")) {
          console.log("yes");
          window.location = `ind.php?delete=${sno}`;
        }
        else {
          cosole.log("no");
        }

      })
    });
  </script>
</body>

</html>