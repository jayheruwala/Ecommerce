<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="css/table.css">
<style>
    .selectItm {
        display: block;
        width: 150px;
        padding: 0.375rem 2.25rem 0.375rem 0.75rem;
        -moz-padding-start: calc(0.75rem - 3px);
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    td{
        width:calc(100% / 7);
    }
</style>

<body>
    <?php
        include_once 'header.php';
    ?>

    <section class="home">
        <div class="searchX">
            <div style="display: flex; justify-content: end; gap: 20px;">
                <div class="dropdown">
                    <select name="" id="searchMethod" class="custom-select findstatus form-select" style="width: 150px;">
                        <option value="">All</option>
                        <option value="user_id">User Id</option>
                        <option value="name">Name</option>
                        <option value="email_id">Email Id</option>
                        <option value="mobile_no">Mobile No</option>
                        <option value="pin_code">Pin Code</option>
                    </select>
                </div>
                <div class="search">
                    <input type="text" name="" id="getSearch" class="selectItm">
                </div>
            </div>
        </div>

        <div>
            <div class="table-responsive">
                <table class="table table-bordered caption-top table-responsive table-striped">
                    <caption>
                        Customer's Information
                    </caption>
                    <thead class="thead-dark">
                        <tr>
                            <td>User ID</td>
                            <td>Name</td>
                            <td>Email ID</td>
                            <td>Contact No</td>
                            <td>Address</td>
                            <td>City</td>
                            <td>Pin-code</td>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                            $user = "SELECT * FROM `register` ORDER BY user_id ASC";
                            $userQueryResult = mysqli_query($conn,$user);
                            if(mysqli_num_rows($userQueryResult) > 0){
                                while($fetch = mysqli_fetch_assoc($userQueryResult)){
                                    ?>
                        <tr>
                            <td>
                                <?php echo $fetch['user_id'] ?>
                            </td>
                            <td>
                                <?php echo $fetch['name'] ?>
                            </td>
                            <td>
                                <?php echo $fetch['email_id'] ?>
                            </td>
                            <td>
                                <?php echo $fetch['mobile_no'] ?>
                            </td>
                            <td>
                                <?php echo $fetch['address'] ?>
                            </td>
                            <td>
                                <?php echo $fetch['city'] ?>
                            </td>
                            <td>
                                <?php echo $fetch['pin_code'] ?>
                            </td>
                        </tr>
                        <?php
                                }
                            }else{
                                ?>
                        No Data Found..
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
        var tbody = document.getElementById('tbody');
        var input = document.getElementById('getSearch');

        input.addEventListener("input",function(event){
            var searchMethod = document.getElementById('searchMethod').value;
            var name = input.value;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    tbody.innerHTML = this.responseText;
                }
            }
            xhr.open('GET','searchCustomer.php?name='+name+'&searchMethod='+searchMethod,true);
            xhr.send();
        })
    </script>
</body>

</html>