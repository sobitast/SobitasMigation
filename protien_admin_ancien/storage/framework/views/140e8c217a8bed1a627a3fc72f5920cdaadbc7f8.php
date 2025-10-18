<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Facture <?php echo e(@$facture->numero); ?></title>
</head>

<body>


    <?php
        $coordonnee = App\Coordinate::first();
        //$produits = App\Product::all();
    ?>

    <style>
        #invoice {
            padding: 30px;
        }

        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            padding: 10px 10px;
            margin-bottom: 20px;
            border-bottom: 1px solid #ff4000
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .contacts {
            margin-bottom: 20px
        }

        .invoice .invoice-to {
            text-align: left
        }

        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .invoice-details {
            text-align: right
        }

        .company-details .invoice-id {
            margin: 26px;
            text-transform: uppercase;

        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: -100px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            font-size: 16pt;
            border-left: 6px solid #ff4000
        }

        .invoice main .notices .notice {
            font-size: 16pt
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td,
        .invoice table th {

            border-bottom: 1px solid #fff
        }

        .invoice table th {
            white-space: nowrap;

            font-size: 13pt
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            /* code */
            color: #ff4000;
            font-size: 16pt
        }

        .invoice table .qty,
        .invoice table .total,
        .invoice table .unit {
            text-align: right;
            font-size: 16pt
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            /* background: #fd5820; */
            background: #ff4000;
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            /* background: #fd5820; */
            background: #ff4000;
            color: #fff
        }

        .invoice table tbody tr:last-child td {
            border-bottom: 1px solid #b4b4b4
        }

        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 16pt;
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .invoice table tfoot tr:last-child td {

            font-size: 1.4em;

        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            font-size: 18px width: 100%;
            text-align: center;
            color: #000;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }

        .hide_print {
            display: initial;
        }

        .table1 {}

        @media print {
            .invoice {

                overflow: hidden !important
            }

            .invoice footer {
                position: absolute;
                bottom: 35px;
                page-break-after: always
            }

            .hide_print {
                display: none
            }

            .invoice>div:last-child {
                page-break-before: always
            }

            .table1 {
                min-height: 10cm
            }

            .page-content {
                zoom: 100%;
            }
        }

        thead th {
            /* background: #fd5820 !important; */
            background: #ff4000 !important;

            background-color: #ff4000 !important;
            color: #fff !important;
            font-weight: 600 !important;
            text-transform: uppercase !important;
            padding: 5px !important;
            text-align: center !important;
            border: 1px solid #ff4000 !important;
            border-top: 1px solid #ff4000 !important;
        }

        .table1 td {
            border-right: 1px solid #b4b4b4;
            border-left: 1px solid #b4b4b4;
            padding: 6px !important
        }

        tfoot td,
        tfoot th {
            text-align: right
        }

        tfoot th:last-child {
            border-bottom: 1px solid #b4b4b4;
        }

        tfoot tr:last-child th:last-child {
            background: #fd582033;
            border-top: 2px solid black !important;

        }

        .bt {
            border-top: 2px solid black !important;
        }

        .bggray {

            background-color: gray !important;

        }

        /* a copier  */

        .contacts .address,
        .contacts .email,
        .contacts .to {
            font-weight: 600;
            font-size: 12pt
        }

        tbody {
            font-size: 10pt !important;
        }
    </style>

    <div class="page-content">

        <div id="invoice">

            <div class="toolbar hidden-print hide_print ">
                <div class="text-right">
                    <button id="printInvoice" class="btn btn-info" onclick="print()"><i class="fa fa-print"></i>
                        Imprimer</button>
                    <a class="btn btn-info" href="<?php echo e(route('voyager.facture-tvas.index')); ?>"><i
                            class="fa fa-file-pdf-o"></i> Retour</a>
                </div>
                <hr>
            </div>
            <div class="invoice overflow-auto">
                <div style="min-width: 600px">
                    <header style="background: #eeeeee !important;">
                        <div class="row">
                            <div class="col">

                                <img src="<?php echo e(Voyager::image($coordonnee->logo_facture)); ?>" data-holder-rendered="true"
                                    style="width : 220px" />
                                <h4 class="name">

                                    <?php echo e($coordonnee->abbreviation); ?>


                                </h4>
                                <div><b>Email : </b> &nbsp; <?php echo e($coordonnee->email); ?></div>
                                <div><b>Adresse : </b> &nbsp; <?php echo e($coordonnee->adresse_fr); ?></div>
                                <div><b>Tél : </b> &nbsp;<?php echo e($coordonnee->phone_1); ?> <?php if($coordonnee->phone_2): ?>
                                        <span>/ <?php echo e($coordonnee->phone_2); ?></span>
                                    <?php endif; ?>
                                </div>
                                <?php if(@$coordonnee->registre_commerce): ?>
                                    <div> <b>RC : </b>&nbsp; <?php echo e($coordonnee->registre_commerce); ?></div>
                                <?php endif; ?>
                                <?php if(@$coordonnee->matricule): ?>
                                    <div> <b>MF : </b>&nbsp; <?php echo e($coordonnee->matricule); ?></div>
                                <?php endif; ?>

                            </div>
                            <div class="col company-details">
                                <h1 class="invoice-id">Facture </h1>
                                <div class="date"><b>Date :</b> <?php echo e($facture->created_at->format('d-m-Y')); ?>

                                </div>
                                <div class="date"> <b>Numéro:</b> <?php echo e($facture->numero); ?>

                                </div>


                            </div>
                        </div>
                    </header>
                    <main>
                        <?php if(@$facture->client): ?>
                            <div class="row contacts">
                                <div class="col invoice-to">



                                    <h5 class="text-gray-light">INFORMATIONS DU CLIENT </h5>
                                    <hr style="margin : 9px">
                                    <b class="to"> <b>Nom :</b> <?php echo e(@$facture->client->name); ?></b>
                                    <div class="address"><b>Adresse :</b>
                                        <?php echo e(@$facture->client->adresse); ?></div>
                                    <?php if($facture->client->matricule): ?>
                                        <div class="email"><a><b>Matricule :</b>
                                                <?php echo e(@$facture->client->matricule); ?></a></div>
                                    <?php endif; ?>
                                    <div class="email"><a><b>Numéro de téléphone:</b> <?php echo e(@$facture->client->phone_1); ?></a>
                                    </div>
                                    



                                </div>
                                <div class="col invoice-details">






                                </div>
                            </div>
                        <?php endif; ?>
                        <br><br>
                        <div class="table1">
                            <table class="table" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th style="width : 5% ;background: #ff4000 !important">#</th>
                                        <th style="width : 25% ;background: #ff4000 !important">Produit</th>
                                        <th style="width : 10% ;background: #ff4000 !important">Qte</th>
                                        <th style="width : 15% ;background: #ff4000 !important">P.U.HT</th>
                                        <th style="width : 15% ;background: #ff4000 !important">TVA</th>
                                        <th style="width : 15% ;background: #ff4000 !important">Totale HT</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                    ?>
                                    <?php $__currentLoopData = $details_facture; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td
                                                <?php if($i % 2 != 0): ?> style="background-color: #eee !important" <?php endif; ?>>
                                                <?php echo e($i); ?></td>
                                            <td
                                                <?php if($i % 2 != 0): ?> style="background-color: #eee !important" <?php endif; ?>>
                                                <?php echo e(@$details->produit->designation_fr); ?>

                                            </td>
                                            <td class="text-center"
                                                <?php if($i % 2 != 0): ?> style="background-color: #eee !important" <?php endif; ?>>
                                                <?php echo e($details->qte); ?></td>
                                            <td class="text-right"
                                                <?php if($i % 2 != 0): ?> style="background-color: #eee !important" <?php endif; ?>>
                                                <?php echo e(number_format((float) @$details->prix_unitaire, 3, '.', '')); ?></td>
                                            <td class="text-right"
                                                <?php if($i % 2 != 0): ?> style="background-color: #eee !important" <?php endif; ?>>
                                                <?php echo e(@$details->tva); ?> %</td>
                                            <td class="text-right"
                                                <?php if($i % 2 != 0): ?> style="background-color: #eee !important" <?php endif; ?>>
                                                <?php echo e(number_format((float) @$details->prix_ht, 3, '.', '')); ?></td>

                                            
                                        </tr>
                                        <?php
                                            $i++;
                                        ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>&nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <th colspan="3" style="border-top : none"> Totale HT</th>
                                        <th class="text-right">
                                            <?php echo e(number_format((float) @$facture->prix_ht, 3, '.', '')); ?></th>
                                    </tr>

                                    <?php if($facture->remise): ?>
                                        <tr>
                                            <td colspan="2"></td>
                                            <th colspan="3">Remise</th>
                                            <th class="text-right">
                                                <?php echo e(number_format((float) @$facture->remise, 3, '.', '')); ?></th>
                                        </tr>
                                    <?php endif; ?>
                                    
                                    
                                    <tr>
                                        <td colspan="2"></td>
                                        <th colspan="3">TVA</th>
                                        <th class="text-right"><?php echo e(number_format((float) @$facture->tva, 3, '.', '')); ?>

                                        </th>


                                    </tr>
                                    
                                    <tr>
                                        <td colspan="2"></td>
                                        <th colspan="3">Timbre</th>
                                        <th class="text-right">
                                            <?php echo e(number_format((float) @$facture->timbre, 3, '.', '')); ?></th>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <th colspan="3">Totale TTC</th>
                                        <th class="text-right">
                                            <?php echo e(number_format((float) @$facture->prix_ttc, 3, '.', '')); ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <input type="hidden" id="totale" value="<?php echo e($facture->prix_ttc); ?>">
                        
                        <?php if(@$coordonnee->note): ?>
                            <div class="notices">
                                <div>Note:</div>
                                <div class="notice"> <?php echo e($coordonnee->note); ?>

                                    <span id="words"></span>
                                </div>
                            </div>
                            <br>
                        <?php endif; ?>
                        <div style="    margin-left: 140px;
                        text-decoration: underline;">
                            Signature et cachet
                        </div>
                    </main>
                    <footer>
                        Bank UIB RIB : <?php echo e($coordonnee->rib); ?>

                    </footer>
                </div>
                <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                <div></div>
            </div>
        </div>
    </div>
    
    <script>
        console.log('r', document.getElementById('totale').value)


        var a = ['', 'un ', 'deux', 'trois ', 'quatre ', 'cinq ', 'six ', 'sept ', 'huit ', 'neuf ', 'dix ', 'onze ',
            'douze ', 'treize ', 'quatorze ', 'quinze ', 'seize ', 'dix-sept ', 'dix-huit ', 'dix-neuf '
        ];
        var b = ['', '', 'vingt', 'trante', 'quarante', 'cinquante', 'soixante', 'soixante-dix', 'quatre-vingt',
            'quatre-vingt-dix'
        ];

        document.getElementById('words').innerHTML = inWords(document.getElementById('totale').value);

        function inWords(num) {

            console.log('t', num)
            console.log(num.toString().split('.'))
            /*         var y = num.toString().split('.')
                    console.log('t',y) */
            //  num = +num
            let tab = num.toString().split('.')

            console.log('tab', tab)
            console.log('t', num)

            if ((num = num.toString()).length > 9) return 'overflow';
            n = ('000000000' + tab[0]).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
            // n=num

            console.log('n', n)
            if (!n) return;
            var str = '';
            str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + ' ' : '';
            console.log('str', str)
            str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + ' ' : '';
            str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'milles ' : '';
            str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'cents ' : '';
            str += (n[5] != 0) ? ((str != '') ? ' ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) +
                'dinars ' : '';
            if (tab.length > 1) {
                let nb = tab[1]
                if (nb < 10) {
                    nb = nb * 100
                } else if (nb < 100) {
                    nb = nb * 10
                }
                return str + ' et ' + nb + ' millimes'
            } else {
                return str;

            }
        }
    </script>
    <?php $__env->startSection('javascript'); ?>

        <script>
            function print() {

                window.print()
            }
        </script>

    <?php $__env->stopSection(); ?>

</body>

</html>
<?php /**PATH C:\wamp64\www\sobitas\protien_admin_ancien\resources\views\admin\facturation\imprimer_facture_tva.blade.php ENDPATH**/ ?>