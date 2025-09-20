<!DOCTYPE html>
<html lang="en">

<head>
  <title>PHP Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <head>
    <title>Ali Al-Obal</title>
    <style>
      div {
        width: 30%;
        height: auto;
        margin: 40px auto;
        border-radius: 20px 20px 20px 20px;
        box-shadow: 0px 0px 15px;
        background: rgb(2, 0, 36);
        border: 3px solid;
        padding: 10px;
        display: inline-block;
      }

      body {
        background: linear-gradient(to right, #8e2de2, #4a00e0);
      }

      input[type="text"],
      .submit1,
      .submit2,
      .submit3,
      select {
        width: 60%;
        height: 33px;
        border-radius: 15px;
        margin-left: 20%;
        margin-top: 20px;
      }

      .btnBackHome {
        margin: auto;
        margin-left: auto;
        margin-right: auto;
        display: block;
        border: 3px solid white;
        border-radius: 20px;
        box-shadow: 0px 0px 15px;
        background: rgb(2, 0, 36);
        text-align: center;
        font-size: large;
        font-weight: bold;
        color: white;
        padding: 20px;
      }

      /* #ColId, */
      /* #Col_No, */
      /* #Dep_No, */
      #Stu_No,
      #Stt_No {
        margin: auto;
        display: block;
        margin-left: auto;
        margin-right: auto;
        border: 1px solid rgb(2, 0, 36);
        border-radius: 20px 20px 20px 20px;
        box-shadow: 0px 0px 15px;
        color: white;
        font-size: 10px;
        text-align: center;
      }
    </style>
  </head>

<body onload="myFunction();">
  <div>
    <!-- بداية واجهة ادخال طالب جديدة -->
    <form action="" method="post">
      <!-- <h1 id="ColId"></h1> -->
      <select name="Col" id="Col" onchange="dep1(this.value);">
        <option value="">--SELECT COLLEGE--</option>
      </select> <br><br>
      <select name="Dep" id="Dep" onchange="st1(this.value);">
        <option>-------</option>
      </select><br><br>
      <input type="text" placeholder="Enter Student Name" name="name_st" id="name_st" required>
      <br><br>
      <input class="submit1" type="submit" name="submit1" value="Add Student">
    </form>
  </div>

  <div>
    <!-- بداية واجهة تعديل طالب جديدة -->
    <form action="" method="post">
      <h1 id="Stt_No"></h1>
      <select name="Stedt" id="Stedt" onchange="select_col_dep(this.value)">
        <option>--SELECT STUDENT--</option>
      </select><br><br>
      <!-- <h1 id="Col_No"></h1> -->
      <select name="coledt" id="coledt" onchange="dep2(this.value);">
        <option value="">-------</option>
      </select><br><br>
      <!-- <h1 id="Dep_No"></h1> -->
      <select name="Depdet" id="Depdet">
        <!-- onchange="dep_no(this.value);" -->
        <option>-------</option>
      </select>
      <input type="text" placeholder="Enter New Student Name" name="name_st_edt" id="name_st_edt" required>
      <br><br>
      <input class="submit2" type="submit" name="submit2" value="Update Student">
    </form>
  </div>


  <div>
    <!-- بداية واجهة حذف طالب جديدة -->
    <form action="" method="post">
      <h1 id="Stu_No"></h1>
      <select name="Steremo" id="Steremo" onchange="select_student_remove(this.value)">
        <option>--SELECT STUDENT--</option>
      </select><br><br>
      <input class="submit2" type="submit" name="submit3" value="Delete Student">
    </form>
  </div>

  <input type="submit" value="Back To Home" class="btnBackHome" onclick="goto_index_page('index.php')">

</body>

</html>
<script>
  function myFunction() {
    document.getElementById('name_st').value = "";

  }
</script>
<?php
$db_user = "root";
$db_pass = "";
$db_databas = "Student";
$db = mysqli_connect("localhost", "$db_user", "$db_pass", "$db_databas");
mysqli_query($db, "SET NAMES utf8");
mysqli_query($db, "SET CHARACTER SET utf8");
$ar_c_id = array();
$ar_c_in = array();
$ar_d_id = array();
$ar_d_ic = array();
$ar_d_in = array();
$ar_s_id = array();
$ar_s_ic = array();
$ar_s_in = array();

#######One
$sql_col = mysqli_query($db, "SELECT * FROM Col");
$cd1 = 0;
while ($key_col = mysqli_fetch_assoc($sql_col)) {

  $ar_c_id[$cd1] = $key_col['Col_No'];
  $ar_c_in[$cd1] = $key_col['Col_Name'];
  $cd1++;

  echo "<script>
    var col=document.getElementById('Col');
    col.innerHTML+='<option value=" . $key_col['Col_No'] . ">" . $key_col['Col_Name'] . "</option>';
    </script>";
}

$qry = mysqli_query($db, "SELECT * FROM Depart ");
$cd = 0;
while ($k_d = mysqli_fetch_assoc($qry)) {
  $ar_d_id[$cd] = $k_d['Dep_No'];
  $ar_d_ic[$cd] = $k_d['Col_No'];
  $ar_d_in[$cd] = $k_d['Dep_Name'];
  $cd++;
}

$qry2 = mysqli_query($db, "SELECT * FROM St");
$cd2 = 0;
while ($k_d2 = mysqli_fetch_assoc($qry2)) {
  $ar_s_id[$cd2] = $k_d2['St_No'];
  $ar_s_ic[$cd2] = $k_d2['Dep_No'];
  $ar_s_ico[$cd2] = $k_d2['Col_No'];
  $ar_s_in[$cd2] = $k_d2['St_Name'];
  $cd2++;

  echo
  "<script>
    var st=document.getElementById('Stedt');
    st.innerHTML+='<option value=" . $k_d2['St_No'] . ">" . $k_d2['St_Name'] . "</option>';
    </script>";

  echo
  "<script>
    var st=document.getElementById('Steremo');
    st.innerHTML+='<option value=" . $k_d2['St_No'] . ">" . $k_d2['St_Name'] . "</option>';
    </script>";
}

?>
<script>
  function dep1(id) {
    var dn = <?php echo '["' . implode('", "', $ar_d_in) . '"]' ?>;
    var dc = <?php echo '["' . implode('", "', $ar_d_ic) . '"]' ?>;
    var di = <?php echo '["' . implode('", "', $ar_d_id) . '"]' ?>;

    var dd = document.getElementById("Dep");

    // var cc = document.getElementById("ColId");
    // cc.innerHTML = "<h1 id='ColId'>" + id + "</h1>";

    dd.focus();
    if (dc.includes(id)) {
      dd.innerHTML = "<option > SELECT DEPART </option>";
      for (var i = 0; i < dc.length; i++) {
        if (dc[i] == id) {
          dd.innerHTML += "<option value='" + di[i] + "'>" + dn[i] + "</option>";
        }
      }
    } else {
      dd.innerHTML = "<option > !NOT FOUND </option>";
    }
  }

  function dep2(id) {
    var dn = <?php echo '["' . implode('", "', $ar_d_in) . '"]' ?>;
    var dc = <?php echo '["' . implode('", "', $ar_d_ic) . '"]' ?>;
    var di = <?php echo '["' . implode('", "', $ar_d_id) . '"]' ?>;

    var dd2 = document.getElementById("Depdet");

    // var cc = document.getElementById("Col_No");
    // cc.innerHTML = "<h1 id='Col_No'>" + id + "</h1>";

    dd2.focus();
    if (dc.includes(id)) {
      dd2.innerHTML = "<option > SELECT DEPART </option>";
      for (var i = 0; i < dc.length; i++) {
        if (dc[i] == id) {
          dd2.innerHTML += "<option value='" + di[i] + "'>" + dn[i] + "</option>";
        }
      }
    } else {
      dd2.innerHTML = "<option > !NOT FOUND</option>";
    }
  }

  //////////towwwwwww
  var stt = document.getElementById('St');
  var depp = document.getElementById('Depdet');
  var coll = document.getElementById('coledt');

  function st1(dd) {
    stt.innerHTML = "<option > SELECT STUDENT </option>";
    var dn = <?php echo '["' . implode('", "', $ar_s_in) . '"]' ?>;
    var dc = <?php echo '["' . implode('", "', $ar_s_ic) . '"]' ?>;
    var di = <?php echo '["' . implode('", "', $ar_s_id) . '"]' ?>;

    stt.focus();
    if (sc.includes(dd)) {
      for (var g = 0; g < sc.length; g++) {
        if (sc[g] == dd) {
          stt.innerHTML += "<option value='" + si[g] + "'>" + sn[g] + "</option>";
        }
      }
      document.getElementById('name_st').value = "";
    } else {
      stt.innerHTML = "<option > !NOT FOUND </option>";
    }
  }

  function select_col_dep(dd) {
    var dn = <?php echo '["' . implode('", "', $ar_d_in) . '"]' ?>;
    var dc = <?php echo '["' . implode('", "', $ar_d_ic) . '"]' ?>;
    var di = <?php echo '["' . implode('", "', $ar_d_id) . '"]' ?>;

    var ci = <?php echo '["' . implode('", "', $ar_c_id) . '"]' ?>;
    var cn = <?php echo '["' . implode('", "', $ar_c_in) . '"]' ?>;

    depp.innerHTML = "<option > SELECT DEPART </option>";
    coll.innerHTML = "<option > SELECT COLLEGE </option>";
    var si = <?php echo '["' . implode('", "', $ar_s_id) . '"]' ?>;

    var ss = document.getElementById("Stt_No");
    ss.innerHTML = "<h1 id='Stt_No'>" + dd + "</h1>";

    depp.focus();

    if (si.includes(dd)) {
      for (var g = 0; g < di.length; g++) {
        depp.innerHTML += "<option value='" + di[g] + "'>" + dn[g] + "</option>";
      }
      for (var g = 0; g < ci.length; g++) {
        coll.innerHTML += "<option value='" + ci[g] + "'>" + cn[g] + "</option>";
      }
    } else {
      depp.innerHTML = "<option > !NOT FOUND </option>";
      coll.innerHTML = "<option > !NOT FOUND </option>";
    }
  }

  // function dep_no(dno) {
  //   var ddno = document.getElementById("Dep_No");
  //   ddno.innerHTML = "<h1 id='Dep_No'>" + dno + "</h1>";
  // }

  function select_student_remove(idd) {
    var ddno = document.getElementById("Stu_No");
    ddno.innerHTML = "<h1 id='Stu_No'>" + idd + "</h1>";

  }

  function goto_index_page(page) {
    window.location.href = page;
  }
</script>
<?php

//Add new student
if (isset($_POST['submit1'])) {
  if ($_POST['Col'] != null and $_POST['Dep'] != null and $_POST['name_st'] != "") {
    // code...

    mysqli_query($db, "INSERT INTO`St`(`Col_No`,`Dep_No`,`St_Name`) VALUES (" . $_POST['Col'] .  "," . $_POST['Dep'] . ",'" . $_POST['name_st'] . "'); ");
    echo ("<script>alert('" . $_POST['name_st'] . "');</script>");
  }
} else {
  $_POST['name_st'] = "";
}

//Update new student
if (isset($_POST['submit2'])) {
  if ($_POST['coledt'] != null and $_POST['Depdet'] != null and $_POST['name_st_edt'] != "" and $_POST['Stedt'] != null) {
    // code...

    $st_name = $_POST['name_st_edt'];
    $dep_no = $_POST['Depdet'];
    $col_no = $_POST['coledt'];
    $st_no = $_POST['Stedt'];

    $query = "UPDATE st set 
      St_Name = '$st_name',
      Dep_No = '$dep_no',
      Col_No = '$col_no'
      WHERE St_No=$st_no";
    mysqli_query($db, $query);

    echo ("<script>alert('" . $_POST['name_st_edt'] . "');</script>");
  }
} else {
  $_POST['name_st'] = "";
}

//Delete new student
if (isset($_POST['submit3'])) {
  if ($_POST['Steremo'] != null) {
    // code...

    $st_no = $_POST['Steremo'];

    $query = "DELETE FROM st WHERE St_No = $st_no";
    $result = mysqli_query($db, $query);
    if (!$result) {
      die("Query Failed.");
    } else
      echo ("<script>alert('" . $result . "');</script>");
  }
} else {
  $_POST['name_st'] = "";
}

?>