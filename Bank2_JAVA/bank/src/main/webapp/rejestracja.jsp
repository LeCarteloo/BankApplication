<%--
  Created by IntelliJ IDEA.
  User: h
  Date: 18.01.2021
  Time: 10:30
  To change this template use File | Settings | File Templates.
--%>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<html lang="pl">
<head>
    <meta charset="utf-8">
    <style> <%@include file="/WEB-INF/rejestracja.css" %> </style>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<div id="content">
    <form method="post">

        <div id="odstpet"></div>
        <a href="index.php"><div id="logo">
            <div id="logo_text">
                BardzoZły
            </div>
            <div id="logo_text2">
                Bank
            </div>
        </div></a>
        <div id="kreska"></div>
        <div class="boxetap">
            <div class="boxlewa">
                <i class="far fa-id-card"></i><div class="textboxa">Dane logowania</div>
            </div>
            <div class="boxprawa">
                <div id="odstepbox3"></div>
                <div id="wejscierowne">
                    <div class="wejscie">
                        <div class="textt">Login</div>
                        <div class="inputyy"><input type="text" name="login" required></div>

                    </div>
                </div>

                <div id="wejscierowne">
                    <div class="wejscie">
                        <div class="textt">Hasło</div>
                        <div class="inputyy"><input type="password" name="haslo" required></div>

                    </div>
                </div>

                <div id="wejscierowne">
                    <div class="wejscie">
                        <div class="textt">Powtórz hasło</div>
                        <div class="inputyy"><input type="password" name="powtorzHaslo" required></div>

                    </div>
                </div>
            </div>
        </div>
        <div class="boxetap">
            <div class="boxlewa">
                <i class="far fa-id-card"></i><div class="textboxa">Dane osobowe</div>
            </div>
            <div class="boxprawa">
                <div id="odstepbox"></div>
                <div id="wejscierowne">
                    <div class="wejscie">
                        <div class="textt">Imię</div>
                        <div class="inputyy"><input type="text" name="imie" required></div>

                    </div>
                </div>

                <div id="wejscierowne">
                    <div class="wejscie">
                        <div class="textt">Nazwisko</div>
                        <div class="inputyy"><input type="text" name="nazwisko" required></div>


                    </div>
                </div>

                <div id="wejscierowne">
                    <div class="wejscie">
                        <div class="textt">PESEL</div>
                        <div class="inputyy"><input type="text" name="pesel" required></div>

                    </div>
                </div>

                <div id="wejscierowne">
                    <div class="wejscie">
                        <div class="textt">Adres e-mail</div>
                        <div class="inputyy"><input type="email" name="email" required></div>
                    </div>
                </div>

                <div id="wejscierowne">
                    <div class="wejscie">
                        <div class="textt">Telefon komórkowy</div>
                        <div class="inputyy"><input type="text" name="telefon" required></div>

                    </div>
                </div>
            </div>
        </div>
        <div class="boxetap">
            <div class="boxlewa">
                <i class="fas fa-city"></i><div class="textboxa">Adres zamieszkania</div>
            </div>
            <div class="boxprawa">
                <div id="odstepbox2"></div>
                <div id="wejscierowne">
                    <div class="wejscie">
                        <div class="textt">Miejscowość</div>
                        <div class="inputyy"><input type="text" name="miejscowosc" required></div>

                    </div>
                </div>

                <div id="wejscierowne">
                    <div class="wejscie">
                        <div class="textt">Ulica</div>
                        <div class="inputyy"><input type="text" name="ulica" required></div>

                    </div>
                </div>

                <div id="wejscierowne">
                    <div class="wejscie">
                        <div class="textt">Numer domu/Numer mieszkania</div>
                        <div class="inputyy"><input type="text" name="numer_domu" required></div>

                    </div>
                </div>

                <div id="wejscierowne">
                    <div class="wejscie">
                        <div class="textt">Kod pocztowy</div>
                        <div class="inputyy"><input type="text" name="kod" required></div>


                    </div>
                </div>

            </div>
        </div>
        <div class="boxetap">
            <div class="boxlewa">
                <i class="fas fa-file-alt"></i><div class="textboxa">Oświadczenia</div>
            </div>
            <div class="boxprawa">
                <div id="odstepbox2"></div>
                <div class="wybor">
                    <label>
                        <input type="checkbox" name="check1">
                        <span>Wyrażam zgodę na przetwarzanie przez Bank podanych przeze mnie danych kontaktowych</span>
                    </label>
                </div>
                <div class="wybor">
                    <label>
                        <input type="checkbox" name="check2">
                        <span>Jestem świadomy(-ma) odpowiedzialności karnej za złożenie fałszywego oświadczenia</span>
                    </label>
                </div>
                <div class="wybor">
                    <label>
                        <input type="checkbox" name="check3">
                        <span>Wyrażam zgodę na używanie przez Bank połączenia telefonicznego</span>
                    </label>
                </div>
            </div>
        </div>
        <div id="przyciskrej">
            <div id="p1"><a href="index.jsp"><input type="button" value="Wróć"></a></div>
            <div id="p2"><a href=""><input type="submit" value="Załóż konto" name="zalozKonto" id="zalozKonto"></a></div>
        </div>
        <div id="stopka">
            STOPKA COPYRAJT @ NIE MOJE
        </div>

        <div class="center">
            <div class="content">
                <div class="header">
                    <h2>Sukces</h2>
                    <div class="close-icon"><label for="click" class="fas fa-times"></label></div>
                </div>
                <label for="click" class="fas fa-check-circle fa-4x"></label>
                <p class = "text">Udało Ci się pomyślnie zarejestrować!</p>
                <div class="line"></div>
                <label for="click" class="close-btn">Zamknij</label>
            </div>
        </div>



    </form>
</div>

<script>
</script>

</body>
</html>

