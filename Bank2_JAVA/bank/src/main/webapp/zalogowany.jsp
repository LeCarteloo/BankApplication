<%--
  Created by IntelliJ IDEA.
  User: h
  Date: 18.01.2021
  Time: 11:49
  To change this template use File | Settings | File Templates.
--%>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<jsp:useBean id="user" class="bankB.user"
             scope="session"></jsp:useBean>

<jsp:setProperty property="*" name="user" />


<html lang="pl">
<%
    if(user.getName() == null) {
%>
<script>
    location.href = "/";
</script>
<%
    }
%>
<head>
    <meta charset="utf-8">
    <style> <%@include file="/WEB-INF/zalogowany.css" %> </style>
</head>
<body>
<div id="content">
    <div id="odstpet"></div>
    <div id="baner">
        <a href="/zalogowany.jsp"><div id="logo">
            <div id="logo_text">
                BardzoZły
            </div>
            <div id="logo_text2">
                Bank
            </div>
        </div></a>

        <a href="wyloguj.jsp"><div id="wyloguj"> <i class="fas fa-power-off"></i>Wyloguj </div></a>
    </div>
    <div id="menu">
        <ul>
            <li><a href="zalogowany.jsp">Strona główna</a></li>
            <li><a href="przelewZewnetrzny.jsp">Przelewy</a></li>
            <li><a href="historia.jsp">Historia</a></li>
            <li style="float:right;">
                <div class="daned"><% out.println(user.getName()); %></div>
                <div class="daned"><% out.println(user.getSurname()); %></div>
            </li>
        </ul>
    </div>
    <div id="tresc">
        <div id="odstepgora"></div>
        <div id="tekstkonto">Konto osobiste</div>
        <div id="infokonto">
            <div id="sekcja1">
                <div id="nazwakonta">
                    Visa Konto
                </div>
                <div id="numerkonta">

                    <% out.println(user.getBankNumber()); %>
                </div>
            </div>

            <div id="sekcja2">
                <div class="srodki">
                    Saldo bieżące
                </div>
                <div class="srodkiPLN">
                    <% out.println(user.getBalance()); %><span class="PLN">PLN</span>
                </div>
            </div>
            <div id="sekcja3">
                <div class="srodki">
                    Dostępne środki
                </div>
                <div class="srodkiPLN">
                    0,00 <span class="PLN">PLN</span>
                </div>
            </div>
            <div id="sekcja4">
                <div class="srodki">
                    Zablokowane środki
                </div>
                <div class="srodkiPLN">
                    0,00 <span class="PLN">PLN</span>
                </div>
            </div>
        </div>
    </div>
    <div id="stopka">
        STOPKA COPYRAJT @ NIE MOJE
    </div>
</div>
</body>
</html>