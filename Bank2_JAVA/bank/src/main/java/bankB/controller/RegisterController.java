package bankB.controller;

import bankB.Database;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PostMapping;

import javax.servlet.http.HttpServletRequest;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.concurrent.ThreadLocalRandom;

@Controller
public class RegisterController {

    @PostMapping("/registration")
    public String registration(HttpServletRequest request) {

        String login = request.getParameter("login");
        String haslo = request.getParameter("haslo");
        String imie = request.getParameter("imie");
        String nazwisko = request.getParameter("nazwisko");
        String pesel = request.getParameter("pesel");
        String email = request.getParameter("email");
        String telefon = request.getParameter("telefon");
        String miejscowosc = request.getParameter("miejscowosc");
        String ulica = request.getParameter("ulica");
        String numer_domu = request.getParameter("numer_domu");
        String kod = request.getParameter("kod");
        String numerKonta = Database.getBankCode() + ThreadLocalRandom.current().nextLong(1000000000000000L, 9999999999999999L);

        boolean check1 = "checked".equals(request.getParameter("check1"));
        boolean check2 = "checked".equals(request.getParameter("check2"));
        boolean check3 = "checked".equals(request.getParameter("check3"));
        if (check1 && check2 && check3) {
            try {
                Connection conn = Database.getConnection();
                PreparedStatement pstmt = conn.prepareStatement("SELECT * FROM user WHERE login=?");
                pstmt.setString(1, login);
                ResultSet rs = pstmt.executeQuery();
                rs.last();
                if (rs.getRow() > 0) {

                } else {
                    pstmt = conn.prepareStatement("INSERT INTO user (name, surname, login, password, pesel, email, telephoneNumber, location, street, houseNumber, postcode, bankNumber, balance)" +
                            "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0)");
                    pstmt.setString(1, imie);
                    pstmt.setString(2, nazwisko);
                    pstmt.setString(3, login);
                    pstmt.setString(4, haslo);
                    pstmt.setString(5, pesel);
                    pstmt.setString(6, email);
                    pstmt.setString(7, telefon);
                    pstmt.setString(8, miejscowosc);
                    pstmt.setString(9, ulica);
                    pstmt.setString(10, numer_domu);
                    pstmt.setString(11, kod);
                    pstmt.setString(12, numerKonta);

                    pstmt.executeUpdate();
                }
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }
        return "register";
    }
}
