<?php
    require "config.php";
?>

<?php
    $select = $conn->query('SELECT * FROM urls');
    $select->execute();

    $rows = $select->fetchAll(PDO::FETCH_OBJ);


    if(isset($_POST['submit'])){
        if($_POST['url'] == '')
        {
            echo "the input is empty";
        }
        else{
            $url = $_POST['url'];
            $insert = $conn->prepare("INSERT INTO urls (url) VALUES (:url)");
            $insert->execute([
                ':url' => $url
            ]);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    body{
        overflow:hidden;
    }

    .margin{
        margin-top:200px;
    }
</style>
<body>
    <div class="container">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <form action="index.php" method="POST" class="card p-2 margin">
                    <div class="input-group">
                        <input type="text" name="url" id="" class="form-control" placeholder="your_url">
                        <div class="input-group-append">
                            <button type="submit" name="submit" class="btn btn-success">
                                Shorten
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope = "col">Long URL</th>
                            <th scope = "col">Short URL</th>
                            <th scope = "col">Clicks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($rows as $row) :  
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row->url; ?></th>
                            <td><a href="http://localhost/php_projects/short_urls/u?id=<?php echo $row->id ?>" target="_blank">http://localhost/php_projects/short_urls/<?php echo $row->id ?></a></td>
                            <td><?php echo $row->clicks; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>