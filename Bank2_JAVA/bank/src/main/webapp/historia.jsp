<%@ page import="java.sql.*" %><%--
  Created by IntelliJ IDEA.
  User: h
  Date: 18.01.2021
  Time: 11:57
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
    <style> <%@include file="/WEB-INF/historia.css" %> </style>
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
        <div id="trescc">
            <div id="odstepg"></div>
            <div id="inforekord">
                <div id="datar">Data przelewu</div>
                <div id="tytulr">Tytuł przelewu</div>
                <div id="nazwar">Odbiorca</div>
                <div id="nrr">Z numeru konta</div>
                <div id="kwotar">Kwota</div>
            </div>
<%
            Statement statement = null;
            Connection conn = null;
            try {
                Class.forName("com.mysql.jdbc.Driver");
                String url = "jdbc:mysql://localhost:3306/bank2";
                String user2 = "root";
                String password = "";

                conn = DriverManager.getConnection(url, user2, password);

                PreparedStatement pstmt = conn.prepareStatement("SELECT * FROM historia WHERE numerPrzychodzacy = ? OR numerWychodzacy = ?");
                pstmt.setString(1, user.getBankNumber());
                pstmt.setString(2, user.getBankNumber());
                ResultSet rs = pstmt.executeQuery();
                while (rs.next()) {
                    if(rs.getString(2).equals(user.getBankNumber())) {

                        out.println(
                                "<div class=\"rekord\">\n" +
                                        "                <div id=\"datarr\">" + rs.getDate(7) + "</div>\n" +
                                        "                <div id=\"tytulrr\">" + rs.getString(4) + "</div>\n" +
                                        "                <div id=\"nazwarr\">" + rs.getString(5) + "</div>\n" +
                                        "                <div id=\"nrrr\">" + rs.getString(3) + "</div>\n" +
                                        "                <div id=\"kwotarr\">-" + rs.getDouble(6) + " zł</div>\n" +
                                        "            </div>");
                    }else if(!rs.getString(2).equals(""))
                    {
                        out.println(
                                "<div class=\"rekord\">\n" +
                                        "                <div id=\"datarr\">" + rs.getDate(7) + "</div>\n" +
                                        "                <div id=\"tytulrr\">" + rs.getString(4) + "</div>\n" +
                                        "                <div id=\"nazwarr\">" + rs.getString(5) + "</div>\n" +
                                        "                <div id=\"nrrr\">" + rs.getString(3) + "</div>\n" +
                                        "                <div id=\"kwotarrd\">" + rs.getDouble(6) + " zł</div>\n" +
                                        "            </div>");
                    }
                }
            }
                catch(SQLException e)
                {
                    System.out.println(e.getMessage());
                }


%>

            <div class="odstep"></div>
        </div>
    </div>
    <div id="stopka">
        STOPKA COPYRAJT @ NIE MOJE
    </div>
</div>
</body>
</html>
