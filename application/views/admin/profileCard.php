<?php $this->load->view('layouts/includes/adminHeader');?>
<style type="text/css">
    body {
        color: #566787;
    background: #f5f5f5;
    font-family: 'Varela Round', sans-serif;
    font-size: 13px;
  }
  .table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
    border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
  .table-title {
    padding-bottom: 15px;
    background: #299be4;
    color: #fff;
    padding: 16px 30px;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
  }
  .table-title .btn {
    color: #566787;
    float: right;
    font-size: 13px;
    background: #fff;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 10px;
  }
  .table-title .btn:hover, .table-title .btn:focus {
        color: #566787;
    background: #f2f2f2;
  }
  .table-title .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
  }
  .table-title .btn span {
    float: left;
    margin-top: 2px;
  }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
    }
  table.table tr th:first-child {
    width: 60px;
  }
  table.table tr th:last-child {
    width: 100px;
  }
    table.table-striped tbody tr:nth-of-type(odd) {
      background-color: #fcfcfc;
  }
  table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
  }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table td:last-child i {
    opacity: 0.9;
    font-size: 22px;
        margin: 0 5px;
    }
  table.table td a {
    font-weight: bold;
    color: #566787;
    display: inline-block;
    text-decoration: none;
  }
  table.table td a:hover {
    color: #2196F3;
  }
  table.table td a.settings {
        color: #2196F3;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
  table.table .avatar {
    border-radius: 50%;
    vertical-align: middle;
    margin-right: 10px;
  }
  .status {
    font-size: 30px;
    margin: 2px 2px 0 0;
    display: inline-block;
    vertical-align: middle;
    line-height: 10px;
  }
    .text-success {
        color: #10c469;
    }
    .text-info {
        color: #62c9e8;
    }
    .text-warning {
        color: #FFC107;
    }
    .text-danger {
        color: #ff5b5b;
    }
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {
        background: #0397d6;
    }
  .pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }
</style>
<script type="text/javascript">
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
            <h2>Refined Finance <b>Profile Card</b></h2>
          </div>
                       </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>

                    <tr>

                        <th>Item</th>
                        <th>Details</th>

                    </tr>
                </thead>
                <tbody>
                  <?php foreach ($get_users as $users):?>
                    <tr>
                        <td><a href="#"><img src="" class="avatar" alt="Avatar"> Name</a></td>
                    </tr>


                    <tr>
                        <td>1</td>
                        <td><a href="#"><img src="/examples/images/avatar/1.jpg" class="avatar" alt="Avatar"> Name</a></td>
                        <td><?=$users->first_name;?> <?=$users->last_name;?></td>

                    </tr>
          <tr>
                        <td>2</td>
                        <td><a href="#"> Email</a></td>
                        <td><?=$users->email;?></td>

                    </tr>
<tr>
                        <td>2</td>
                        <td><a href="#">mobile Number</a></td>
                        <td><?=$users->mobile;?></td>

                    </tr>
<tr>
                        <td>2</td>
                        <td><a href="#"> username</a></td>
                        <td><?=$users->username;?></td>

                    </tr>

        <tr>
                        <td>2</td>
                        <td><a href="#"> Password</a></td>
                        <td><?=$users->password;?></td>

                    </tr>



             <?php endforeach;?>
                </tbody>
            </table>


        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
            <h2>User <b>Bank Details</b></h2>

          </div>
                       </div>
            </div>
            <?php if ($fetch_bank==false):?>
              <div class="well"> No bank details yet </div>

           <?php else:?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>Item</th>
                        <th>Details</th>

                    </tr>
                </thead>
                <tbody>

                <?php foreach ($fetch_bank as $users):?>



                    <tr>
                        <td>1</td>
                        <td><a href="#"><img src="/examples/images/avatar/1.jpg" class="avatar" alt="Avatar"> Bank Name</a></td>
                        <td><?=$users->bank_name;?></td>

                    </tr>
          <tr>
                        <td>2</td>
                        <td><a href="#"> BVN</a></td>
                        <td><?=$users->bvn;?></td>

                    </tr>
<tr>
                        <td>2</td>
                        <td><a href="#"> Account Name</a></td>
                        <td><?=$users->account_name;?></td>

                    </tr>
<tr>
                        <td>2</td>
                        <td><a href="#"> Account Number</a></td>
                        <td><?=$users->account_number;?></td>

                    </tr>

    <tr>
                        <td>2</td>
                        <td><a href="#"> Card Number Number</a></td>
                        <td><?=$users->card_number;?></td>

                    </tr>
    <tr>
                        <td>2</td>
                        <td><a href="#"> CVV</a></td>
                        <td><?=$users->cvv;?></td>

                    </tr>

 <tr>
    <td>Document 1</td>
                        <td><a href="#"><img src=<?=$users->document;?> class="avatar" alt="Document 2"> Name</a></td>
                    </tr>

                     <tr>
    <td>Document 2</td>
                        <td><a href="#"><img src="" class="avatar" alt="Document 2"> Name</a></td>
                    </tr>


           <?php endforeach;?>

                </tbody>
            </table>

        <?php endif;?>






        </div>

<?php $this->load->view('layouts/includes/footer');?>
