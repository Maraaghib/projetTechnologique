<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=431, height=device-height, initial-scale=1">
        <title>Plateforme des séniors | Inscription</title>
    	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css"/>
        <link rel="stylesheet" href="dist/font-awesome-4.7.0/css/font-awesome.min.css">
    	<link rel="stylesheet" type="text/css" href="dist/css/myStyle.css"/>
        <style media="screen">

        </style>
    </head>
    <body>
        <div class="container navigation">
            <div class="row navigation">
               <nav class="navbar navbar-default navbar-fixed-top">
                   <ol class="breadcrumb">
                       <li><a href="#"><img class="logo"></a></li> <!-- On peut ajouter l'image via le background du CSS -->
                   </ol>
                   <div class="navbar-collapse collapse navbar-right">
                       <ul class="nav navbar-nav">

                       </ul>
                   </div>
               </nav>
           </div> <!-- row navigation -->
        </div> <!-- container navigation -->

        <div class="container header">
            <div class="page-header text-center">
                <h1>Inscription à la plateforme de la Mairie</h1>
            </div>
        </div> <!-- container header -->

        <div class="container content">
            <form class="form-horizontal" action="../controller/signup.php" method="post">
                <div class="row">
                    <div class="col-xs-offset-1 col-xs-10">
                        <div class="form-group form-group-lg">
                            <label id="label-lg" for="" class="control-label label-lg">Prénom:</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="" placeholder="Entrer votre prénom" required>
                        </div>
                        <div class="form-group form-group-lg">
                            <label id="label-lg" for="" class="control-label control-label-lg">Nom:</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="" placeholder="Entrer votre nom" required>
                        </div>
                        <div class="form-group form-group-lg">
                            <label id="label-lg" for="" class="control-label label-lg">E-mail:</label>
                            <input type="email" class="form-control" id="email" name="email" value="" placeholder="Entrer votre e-mail" required>
                        </div>
                        <div class="form-group form-group-lg" id="telPersoDiv">
                            <label id="label-lg" for="" class="control-label label-lg">Téléphone:</label>
                            <input type="num" class="form-control" id="telPerso" name="telPerso" onblur="inputValidation('tel')" placeholder="Numéro de téléphone" required>
                            <span class="help-block" id="helpTel"></span>
                        </div>
                        <div class="form-group form-group-lg" id="genderDiv">
                            <label id="label-lg" for="" class="control-label label-lg">Sexe:</label>
                            <select class="form-control text-right" id="gender" name="gender" onblur="inputValidation('gender')" required>
                                <option value="">Sélectionnez</option>
                                <option value="male">Masculin</option>
                                <option value="female">Féminin</option>
                            </select>
                            <span class="help-block" id="helpVille"></span>
                        </div>
                        <div class="form-group form-group-lg" id="CountryDiv">
                            <label id="label-lg" for="" class="control-label label-lg">Pays:</label>
                            <select class="form-control" id="selectCountryAddr" name="selectCountryAddr" required>
                                <option value="212">AFGHANISTAN</option>
                                <option value="303">AFRIQUE DU SUD</option>
                                <option value="125">ALBANIE</option>
                                <option value="352">ALGERIE</option>
                                <option value="109">ALLEMAGNE</option>
                                <option value="130">ANDORRE</option>
                                <option value="395">ANGOLA</option>
                                <option value="425">ANGUILLA</option>
                                <option value="995">ANTARCTIQUE</option>
                                <option value="441">ANTIGUA ET BARBUDA</option>
                                <option value="201">ARABIE SAOUDITE</option>
                                <option value="415">ARGENTINE</option>
                                <option value="252">ARMENIE</option>
                                <option value="501">AUSTRALIE</option>
                                <option value="110">AUTRICHE</option>
                                <option value="253">AZERBAIDJAN</option>
                                <option value="436">BAHAMAS</option>
                                <option value="249">BAHREIN</option>
                                <option value="246">BANGLADESH</option>
                                <option value="434">BARBADE</option>
                                <option value="131">BELGIQUE</option>
                                <option value="429">BELIZE</option>
                                <option value="327">BENIN</option>
                                <option value="839">BERMUDES</option>
                                <option value="214">BHOUTAN</option>
                                <option value="148">BIELORUSSIE</option>
                                <option value="224">BIRMANIE</option>
                                <option value="418">BOLIVIE</option>
                                <option value="118">BOSNIE-HERZEGOVINE</option>
                                <option value="347">BOTSWANA</option>
                                <option value="416">BRESIL</option>
                                <option value="225">BRUNEI</option>
                                <option value="111">BULGARIE</option>
                                <option value="331">BURKINA FASO</option>
                                <option value="321">BURUNDI</option>
                                <option value="234">CAMBODGE</option>
                                <option value="322">CAMEROUN</option>
                                <option value="401">CANADA</option>
                                <option value="396">CAP-VERT</option>
                                <option value="417">CHILI</option>
                                <option value="216">CHINE</option>
                                <option value="419">COLOMBIE</option>
                                <option value="397">COMORES</option>
                                <option value="406">COSTA RICA</option>
                                <option value="326">COTE D'IVOIRE</option>
                                <option value="119">CROATIE</option>
                                <option value="407">CUBA</option>
                                <option value="101">DANEMARK</option>
                                <option value="399">DJIBOUTI</option>
                                <option value="438">DOMINIQUE</option>
                                <option value="301">EGYPTE</option>
                                <option value="247">EMIRATS ARABES UNIS</option>
                                <option value="420">EQUATEUR</option>
                                <option value="317">ERYTHREE</option>
                                <option value="134">ESPAGNE</option>
                                <option value="106">ESTONIE</option>
                                <option value="129">ETAT DE LA CITE DU VATICAN</option>
                                <option value="404">ETATS UNIS</option>
                                <option value="315">ETHIOPIE</option>
                                <option value="508">FIDJI</option>
                                <option value="105">FINLANDE</option>
                                <option selected="selected" value="0">FRANCE</option>
                                <option value="328">GABON</option>
                                <option value="304">GAMBIE</option>
                                <option value="255">GEORGIE</option>
                                <option value="329">GHANA</option>
                                <option value="133">GIBRALTAR</option>
                                <option value="126">GRECE</option>
                                <option value="435">GRENADE</option>
                                <option value="430">GROENLAND</option>
                                <option value="409">GUATEMALA</option>
                                <option value="847">GUERNESEY</option>
                                <option value="330">GUINEE</option>
                                <option value="314">GUINEE EQUATORIALE</option>
                                <option value="392">GUINEE-BISSAU</option>
                                <option value="428">GUYANA</option>
                                <option value="410">HAITI</option>
                                <option value="411">HONDURAS</option>
                                <option value="112">HONGRIE</option>
                                <option value="848">ILE DE MAN</option>
                                <option value="849">ILES CAYMAN</option>
                                <option value="850">ILES FEROE</option>
                                <option value="515">ILES MARSHALL</option>
                                <option value="517">ILES PALAOS</option>
                                <option value="512">ILES SALOMON</option>
                                <option value="851">ILES VIERGES BRITANNIQUES</option>
                                <option value="223">INDE</option>
                                <option value="231">INDONESIE</option>
                                <option value="203">IRAK</option>
                                <option value="204">IRAN</option>
                                <option value="136">IRLANDE</option>
                                <option value="102">ISLANDE</option>
                                <option value="207">ISRAEL</option>
                                <option value="127">ITALIE</option>
                                <option value="426">JAMAIQUE</option>
                                <option value="217">JAPON</option>
                                <option value="852">JERSEY</option>
                                <option value="222">JORDANIE</option>
                                <option value="256">KAZAKHSTAN</option>
                                <option value="332">KENYA</option>
                                <option value="257">KIRGHIZISTAN</option>
                                <option value="513">KIRIBATI</option>
                                <option value="240">KOWEIT</option>
                                <option value="241">LAOS</option>
                                <option value="348">LESOTHO</option>
                                <option value="107">LETTONIE</option>
                                <option value="205">LIBAN</option>
                                <option value="302">LIBERIA</option>
                                <option value="316">LIBYE</option>
                                <option value="113">LIECHTENSTEIN</option>
                                <option value="108">LITUANIE</option>
                                <option value="137">LUXEMBOURG</option>
                                <option value="333">MADAGASCAR</option>
                                <option value="227">MALAISIE</option>
                                <option value="334">MALAWI</option>
                                <option value="229">MALDIVES</option>
                                <option value="335">MALI</option>
                                <option value="427">MALOUINES (ILES)</option>
                                <option value="144">MALTE</option>
                                <option value="350">MAROC</option>
                                <option value="390">MAURICE</option>
                                <option value="336">MAURITANIE</option>
                                <option value="405">MEXIQUE</option>
                                <option value="516">MICRONESIE</option>
                                <option value="151">MOLDAVIE</option>
                                <option value="138">MONACO</option>
                                <option value="242">MONGOLIE</option>
                                <option value="120">MONTENEGRO</option>
                                <option value="853">MONTSERRAT</option>
                                <option value="393">MOZAMBIQUE</option>
                                <option value="311">NAMIBIE</option>
                                <option value="507">NAURU</option>
                                <option value="215">NEPAL</option>
                                <option value="412">NICARAGUA</option>
                                <option value="337">NIGER</option>
                                <option value="338">NIGERIA</option>
                                <option value="103">NORVEGE</option>
                                <option value="502">NOUVELLE ZELANDE</option>
                                <option value="250">OMAN</option>
                                <option value="339">OUGANDA</option>
                                <option value="258">OUZBEKISTAN</option>
                                <option value="213">PAKISTAN</option>
                                <option value="261">PALESTINE</option>
                                <option value="413">PANAMA</option>
                                <option value="510">PAPOUASIE NOUVELLE GUINEE</option>
                                <option value="421">PARAGUAY</option>
                                <option value="135">PAYS-BAS</option>
                                <option value="422">PEROU</option>
                                <option value="220">PHILIPPINES</option>
                                <option value="855">PITCAIRN</option>
                                <option value="122">POLOGNE</option>
                                <option value="432">PORTO RICO</option>
                                <option value="139">PORTUGAL</option>
                                <option value="248">QATAR</option>
                                <option value="323">REPUBLIQUE CENTRAFRICAINE</option>
                                <option value="254">REPUBLIQUE DE CHYPRE</option>
                                <option value="239">REPUBLIQUE DE COREE</option>
                                <option value="156">REPUBLIQUE DE MACEDOINE</option>
                                <option value="312">REPUBLIQUE DEMOCRATIQUE DU CONGO</option>
                                <option value="408">REPUBLIQUE DOMINICAINE</option>
                                <option value="324">REPUBLIQUE DU CONGO</option>
                                <option value="157">REPUBLIQUE DU KOSOVO</option>
                                <option value="238">REPUBLIQUE POPULAIRE DE COREE</option>
                                <option value="116">REPUBLIQUE TCHEQUE</option>
                                <option value="114">ROUMANIE</option>
                                <option value="132">ROYAUME-UNI</option>
                                <option value="123">RUSSIE</option>
                                <option value="340">RWANDA</option>
                                <option value="389">SAHARA OCCIDENTAL</option>
                                <option value="440">SAINT VINCENT ET LES GRENADINES</option>
                                <option value="128">SAINT-MARIN</option>
                                <option value="857">SAINTE HELENE</option>
                                <option value="439">SAINTE LUCIE</option>
                                <option value="414">SALVADOR</option>
                                <option value="394">SAO TOME-ET-PRINCIPE</option>
                                <option value="341">SENEGAL</option>
                                <option value="121">SERBIE</option>
                                <option value="398">SEYCHELLES</option>
                                <option value="342">SIERRA LEONE</option>
                                <option value="226">SINGAPOUR</option>
                                <option value="117">SLOVAQUIE</option>
                                <option value="145">SLOVENIE</option>
                                <option value="318">SOMALIE</option>
                                <option value="343">SOUDAN</option>
                                <option value="235">SRI LANKA</option>
                                <option value="104">SUEDE</option>
                                <option value="140">SUISSE</option>
                                <option value="437">SURINAME</option>
                                <option value="391">SWAZILAND</option>
                                <option value="206">SYRIE</option>
                                <option value="259">TADJIKISTAN</option>
                                <option value="236">TAIWAN</option>
                                <option value="309">TANZANIE</option>
                                <option value="344">TCHAD</option>
                                <option value="431">TERRITOIRE DES PAYS-BAS</option>
                                <option value="219">THAILANDE</option>
                                <option value="520">TIMOR ORIENTAL</option>
                                <option value="345">TOGO</option>
                                <option value="509">TONGA</option>
                                <option value="433">TRINITE ET TOBAGO</option>
                                <option value="351">TUNISIE</option>
                                <option value="260">TURKMENISTAN</option>
                                <option value="826">TURQUES ET CAIQUES</option>
                                <option value="208">TURQUIE</option>
                                <option value="511">TUVALU</option>
                                <option value="155">UKRAINE</option>
                                <option value="423">URUGUAY</option>
                                <option value="514">VANUATU</option>
                                <option value="424">VENEZUELA</option>
                                <option value="243">VIET NAM</option>
                                <option value="251">YEMEN</option>
                                <option value="346">ZAMBIE</option>
                                <option value="310">ZIMBABWE</option>
                            </select>
                            <span class="help-block" id="helpCountry"></span>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group form-group-lg text-left" id="codePostalDiv">
                                    <label id="label-lg" for="" class="control-label label-lg">Code Postal:</label>
                                    <input type="num" class="form-control" id="codePostal" name="codePostal" onblur="inputValidation('codePostal')" placeholder="XXXXX" required>
                                    <span class="help-block" id="helpCodePostal"></span>
                                </div>
                            </div>
                            <div class="col-md-offset-1 col-md-8">
                                <div class="form-group form-group-lg" id="villeDiv">
                                    <label id="label-lg" for="" class="control-label label-lg">Ville:</label>
                                    <select class="form-control text-right" id="ville" name="ville" onblur="inputValidation('ville')">
                                        <option value="">Sélectionner une ville</option>
                                        <option value="begles">Bègles</option>
                                    </select>
                                    <span class="help-block" id="helpVille"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-group-lg">
                            <label id="label-lg" for="" class="control-label label-lg">Date de naissance:</label>
                            <input type="date" class="form-control" id="dateNaiss" name="dateNaiss" value="" required>
                        </div>
                        <div class="form-group form-group-lg">
                            <label id="label-lg" for="" class="control-label label-lg">Identifiant:</label>
                            <input type="text" class="form-control" id="login" name="login" placeholder="Choisissez un identifiant" required>
                        </div>
                        <div class="form-group form-group-lg">
                            <label id="label-lg" for="" class="control-label label-lg">Mot de passe:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="**************" required>
                        </div>
                        <div class="form-group form-group-lg" id="confirmPasswordDiv">
                            <label id="label-lg" for="" class="control-label label-lg">Confirmation du mot de passe:</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" onblur="inputValidation('confirmPassword')"  placeholder="**************">
                            <span class="help-block" id="helpConfirmPassword"></span>
                        </div>
                        <div class="form-group form-group-lg" style="margin-top: 30px;">
                            <div class="">
                                <button type="button" class="btn btn-default btn-lg" name="openAvatars" id="openAvatars" data-toggle="modal" data-target="#modalAvatars" onclick="displayAvatrs()"><i class="fa fa-camera"></i> Choisir un avatar pour votre profil</button>
                            </div>
                        </div>
                        <input type="hidden" name="avatar" id="avatar" value="img_avatar0.png">
                        <!-- Modal pour choisir les avatars -->
                        <div class="modal fade" id="modalAvatars" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h2 class="modal-title"><i class="fa fa-camera"></i> Choissiez un avatar pour votre profil</h2>
                                    </div>
                                    <div class="modal-body" id="modalContent">
                                        <!-- Les avatrs -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal" id="chooseAvatar"><i class="fa fa-check"></i> Valider</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelAvatar"><i class="fa fa-close"></i> Annuler</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group form-group-lg" style="margin-top: 40px;">
                            <div class="">
                                <center><button type="submit" class="btn btn-default btn-lg large-btn" name="inscription"><span class="glyphicon glyphicon-user"></span> Inscription</button></center>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div> <!-- container content -->

        <div class="container footer">

        </div> <!-- container footer -->

        <script type="text/javascript" src="dist/js/myScript.js"></script>
        <script type="text/javascript" src="dist/js/jquery-3.2.0.min.js"></script>
        <script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#chooseAvatar").click(function(){
                     document.getElementById('avatar').value = $('input[name=avatar_img]:checked', '#modalAvatars').val();
                });
                $("#cancelAvatar").click(function(){
                     document.getElementById('avatar').value = "img_avatar0";
                });
            });

            function displayAvatrs() {
                var modal = document.getElementById('modalContent');
                modal.innerHTML = "";
                for (var i = 0; i < 15; i++) {
                    modal.innerHTML += '<input type="radio" name="avatar_img" id="avatar'+i+'" value="img_avatar'+i+'" class="input-hidden" /> <label for="avatar'+i+'"> <img src="img/avatars/img_avatar'+i+'.png" alt="Avatar" /> </label>';
                }
            }
        </script>
    </body>
</html>
