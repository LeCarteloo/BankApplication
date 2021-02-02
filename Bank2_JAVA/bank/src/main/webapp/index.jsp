<%@ page import="java.sql.*" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <style> <%@include file="/WEB-INF/style.css" %> </style>

    <jsp:useBean id="user" class="bankB.user"
                 scope="session"></jsp:useBean>

    <jsp:setProperty property="*" name="user" />


</head>
<body>
<div id="content">
    <div id="odstpet"></div>
    <a href="index.php"><div id="logo">
        <div id="logo_text">
            BardzoZly
        </div>
        <div id="logo_text2">
            Bank
        </div>
    </div></a>
    <div id="logowanie">
        <div id="tekst_login">
            Logowanie do banku
        </div>
        <form action="" method="post">
            <div id="dane_login">
                <div id="llogin">
                    <div id="logintext">Login</div>
                    <input type="text" class="dane" name="login">
                </div>
                <div id="haslo">
                    <div id="haslotext">Hasło</div>
                    <input type="password" class="dane" name="haslo">
                </div>

            </div>
            <div id="przycisk">
                <input type="submit" value="Zaloguj" name="zaloguj">
            </div>
        </form>
        <%
            String x = request.getParameter("zaloguj");
            if("Zaloguj".equals(x))
            {

            String login = request.getParameter("login");
            String haslo = request.getParameter("haslo");
            Statement statement = null;
            Connection conn = null;
            try{
                Class.forName("com.mysql.jdbc.Driver");
                String url       = "jdbc:mysql://localhost:3306/bank2";
                String user2      = "root";
                String password  = "";

                conn = DriverManager.getConnection(url, user2, password);

                PreparedStatement pstmt = conn.prepareStatement("SELECT * FROM user WHERE login=? AND password=?");
                pstmt.setString(1, login);
                pstmt.setString(2, haslo);

                ResultSet rs = pstmt.executeQuery();
                rs.last();
                if(rs.getRow() == 1)
                {
                    rs.first();
                    String name = rs.getString(2);
                    String surname = rs.getString(3);
                    String bankNumber = rs.getString(13);
                    double balance = rs.getDouble(14);
        %>

        <% user.setName(name);
            user.setSurname(surname);
            user.setBankNumber(bankNumber);
            user.setBalance(balance);
        %>
        <script>
            location.href = "/zalogowany.jsp";
        </script>
        <%
                }else
                {
                    out.println("Błędne dane");
                }
            }
            catch(SQLException e)
            {
                System.out.println(e.getMessage());
            }

            }
        %>

    </div>
    <div id="przyciskrej">
        <a href="rejestracja.jsp"><input type="button" value="Załóż darmowe konto"></a>
    </div>
    <div id="stopka">
        STOPKA COPYRAJT @ NIE MOJE
    </div>
</div>
</body>
</html>
