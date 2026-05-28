<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weekly Lesson Plan</title>

    <style type="text/css">
        .container-print {
            width: 210mm;
            min-height: 297mm;
            padding: 5mm;
            margin: 5mm auto;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }

        body {
            color: #000000;
        }

        table {
            width: 100%;
            border: 2px solid black;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        tr,
        th,
        td {
            border: 2px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>

</head>

<body>

    <div class="container-print">

        <center>
            <img width="70px" src="https://elearning.peachblossomsschool.sch.id/assets/images/logos/logo.png">
            <p><b>Peachblossoms School</b> <br>Kota Harapan Indah Blok RV 2 No. 9 - Tarumajaya Bekasi<br>Phone:
                021-8898-7306 - Website: www.peachblossomsschool.sch.id</p>
        </center>
        <table class="table table-bordered mt-4" style="color: #000000">
            <tr style="color: #000000">
                <td colspan="3" class="font-weight-bold border border-dark text-center text-capitalize">Who Have Not Submitted Unit to Study -
                    <?= $term ?>
                </td>
            </tr>
            <tr>
                <th class="text-center border border-dark">No</th>
                <th class="text-center border border-dark">Subject</th>
                <th class="text-center border border-dark">Class</th>
                <th class="text-center border border-dark">Teacher</th>
            </tr>

            <?php $no=1; foreach ($guruBelumSubmit as $lp) : ?>
            <tr>
                <td class="p-1 border border-dark">
                    <?= $no++ ?>
                </td>
                <td class="p-1 border border-dark">
                    <?= $lp->subject ?>
                </td>
                <td class="p-1 border border-dark">
                    <?= $lp->class ?>
                </td>
                <td class="p-1 border border-dark">
                    <?= $lp->teacher ?>
                </td>
            </tr>
            <tr>

            </tr>
            <?php endforeach; ?>
        </table><br>

        <div class="signature">
            <?= date('F d, Y') ?>
            <br><br>
            <p><b>Peachblossoms School</b></p>
        </div>

    </div>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>