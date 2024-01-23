<?php
require_once "connection.php";
require_once "userquery.php";
$_SESSION['page'] = "viewall";

?>

<html>

<?php require_once "head.php"; ?>

<?php require_once "menu.php"; ?>

<?php require_once "subheader.php" ?>


<br />
<br />
<br />

<div class="container-fluid mb-30">
    <div class="row p-0 pl-3">




        <div class="col-md-12">
            <div class="row">
                <section class="container-fluid jophoto-gallery section-padding mb-30">
                    <div class="container">




                        <div class="row jophoto-photos" id="jophoto-section-photos">
                            <?php
                            if ($_REQUEST['suu'] == "like") {
                                $in = $con->query("insert into likee value('$_REQUEST[uuid]','$_REQUEST[ref]','$_REQUEST[uid]',$_REQUEST[pid],0)");
                            }
                            if ($_REQUEST['suu'] == "unlike") {
                                $in = $con->query("delete from likee where user_userid like '$_REQUEST[uuid]' and reference like '$_REQUEST[ref]' and userid like '$_REQUEST[uid]' and postid like $_REQUEST[pid]");
                            }
                            if ($_REQUEST['suu'] == "download") {
                                $in = $con->query("insert into download value('$_REQUEST[uuid]','$_REQUEST[ref]','$_REQUEST[uid]',$_REQUEST[pid],0,1)");
                            }
                            if ($_REQUEST['action'] == "sear ch") {
                                $data = $con->query("select p.*,sc.*,c.* from posting as p,subcategory as sc,category as c where p.subcategoryid=sc.subcategoryid and p.categoryid=c.categoryid and p.categoryid=sc.categoryid and sc.categoryid=c.categoryid and sc.name like '%$_REQUEST[id]%' or p.subcategoryid=sc.subcategoryid and p.categoryid=c.categoryid and p.categoryid=sc.categoryid and sc.categoryid=c.categoryid and c.name like '%$_REQUEST[id]%' order by rand() limit 0,51");
                            } else {
                                $data = $con->query("select * from posting order by rand()");
                            }
                            while ($row = mysqli_fetch_array($data)) {

                                ?>
                                <div class="col-md-4" data-animate-effect="fadeInUp">
                                    <div class="d-block jophoto-photo-item">
                                        <img src="<?php echo $row[9]; ?>" alt="Image" class="img-fluid">
                                        <div class="row photo-text-more">
                                            <div class="col-md-12 lp">
                                                <div class="row xyz">
                                                    <p class="col-md-8 pt-2 kkd">
                                                        <?php echo $row[7]; ?>
                                                    </p>
                                                    <div class="col-md-3 p-0 pt-2 ml-4 rkd">

                                                        <!-- <form action="" method="post" name="abc"> -->
                                                        <?php
                                                        $like = $con->query("select * from likee where user_userid like '$_SESSION[userid]' and reference like '$row[0]' and userid like '$row[1]' and postid like $row[6]");
                                                        $like = mysqli_fetch_array($like);
                                                        if ($like[0] == "") {
                                                            ?>
                                                            <div class="col-md-3 rkd"
                                                                onclick="likepost('<?php echo $_SESSION['userid']; ?>','<?php echo $row[0]; ?>','<?php echo $row[1]; ?>','<?php echo $row[6]; ?>','index','like');">
                                                                <button class="pinak"><i class="far fa-heart"
                                                                        style="color: #fff;"></i></button>
                                                            </div>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div class="col-md-3 rkd"
                                                                onclick="likepost('<?php echo $_SESSION['userid']; ?>','<?php echo $row[0]; ?>','<?php echo $row[1]; ?>','<?php echo $row[6]; ?>','index','unlike');">
                                                                <button class="pinak"><i class="fas fa-heart"
                                                                        style="color: red;"></i></button>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                        <!-- </form> -->


                                                    </div>
                                                    <!-- <p class="col-md-12 abc">savan</p> -->
                                                </div>
                                                <div class="row pino">
                                                    <p class="col-md-5 ml-2 abc d-flex align-items-end"
                                                        onclick="window.location.href='photodetail.php?ref=<?php echo $row[0]; ?>&id=<?php echo $row[6] ?>&uid=<?php echo $row[1] ?>';">
                                                        <?php if ($row[0] == "company") {
                                                            $data1 = $con->query("select * from company_register where userid like '$row[1]'");
                                                            $row1 = mysqli_fetch_array($data1);
                                                            echo $row1[2];
                                                        } else {
                                                            $data1 = $con->query("select * from designer_register where userid like '$row[1]'");
                                                            $row1 = mysqli_fetch_array($data1);
                                                            echo $row1[2];
                                                        } ?>
                                                    </p>
                                                    <p class="col-md-5 ml-2 nir cba d-flex align-items-end">
                                                        <a class="load" href="<?php echo $row[9]; ?>"
                                                            download="<?php echo rand(0, 9) . "_" . chr(rand(97, 122)) . chr(rand(97, 122)) . chr(rand(97, 122)) . chr(rand(65, 90)) . rand(0, 9) . rand(0, 9) . " - LENSATION"; ?>"
                                                            onclick="likepost('<?php echo $_SESSION['userid']; ?>','<?php echo $row[0]; ?>','<?php echo $row[1]; ?>','<?php echo $row[6]; ?>','index','download');"><i
                                                                class="ti-download"></i></a>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>


                        </div>

                    </div>

                </section>

            </div>

        </div>

    </div>
</div>




<?php require_once "footer.php"; ?>
<?php require_once "script.php"; ?>

</body>

</html>