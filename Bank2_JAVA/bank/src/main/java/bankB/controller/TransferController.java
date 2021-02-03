package bankB.controller;

import bankB.Database;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpSession;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

@Controller
public class TransferController {

    @GetMapping("/transfer")
    public String showTransfer(HttpServletRequest request) {

        HttpSession session = request.getSession(false);
        if (session == null) {
            return "index";
        }

        return "transfer";
    }

    @PostMapping("/transfer")
    public String doTransfer(HttpServletRequest request) {

        String odbiorca = request.getParameter("nazwa");
        String nrKonta = request.getParameter("numer");
        String tytul = request.getParameter("tytul");
        Double kwota = Double.parseDouble(request.getParameter("kwota"));
        String data = request.getParameter("data");
        Double kwotaZlecajacego = (Double) request.getSession().getAttribute("balance");
        if (nrKonta.substring(2, 10).equals(Database.getBankCode())) {
            try {
                Connection conn = Database.getConnection();
                PreparedStatement pstmt = conn.prepareStatement("SELECT * FROM user WHERE bankNumber=?");
                pstmt.setString(1, Database.getBankCountry() + nrKonta);
                ResultSet rs = pstmt.executeQuery();
                rs.last();
                if (rs.getRow() == 1) {
                    pstmt = conn.prepareStatement("UPDATE user SET balance =? WHERE bankNumber=?;");
                    pstmt.setDouble(1, (kwotaZlecajacego - kwota));
                    pstmt.setString(2, Database.getBankCountry() + (String) request.getSession().getAttribute("bankNumber"));
                    pstmt.executeUpdate();
                    System.out.println(Database.getBankCountry() + (String) request.getSession().getAttribute("bankNumber"));
                    request.getSession().setAttribute("balance", kwotaZlecajacego - kwota);

                    pstmt = conn.prepareStatement("UPDATE user SET balance =? WHERE bankNumber=?;");
                    pstmt.setDouble(1, (rs.getDouble("balance") + kwota));
                    pstmt.setString(2, Database.getBankCountry() + nrKonta);
                    pstmt.executeUpdate();

                    pstmt = conn.prepareStatement("INSERT INTO historia (numerZlecajacego, numerOdbiorcy, tytul, nazwa, kwota, data, id_status, type) VALUES (?, ?, ?, ?, ?, ?, 1, 'Wewnetrzny');");
                    pstmt.setString(1, Database.getBankCountry() + request.getSession().getAttribute("bankNumber"));
                    pstmt.setString(2, Database.getBankCountry() + nrKonta);
                    pstmt.setString(3, tytul);
                    pstmt.setString(4, odbiorca);
                    pstmt.setDouble(5, kwota);
                    pstmt.setString(6, data);
                    pstmt.executeUpdate();
                }
            } catch (SQLException e) {
                e.printStackTrace();
            }
        } else {
            try {
                Connection conn = Database.getConnection();
                PreparedStatement pstmt;
                pstmt = conn.prepareStatement("UPDATE user SET balance =? WHERE bankNumber=?;");
                pstmt.setDouble(1, (kwotaZlecajacego - kwota));
                pstmt.setString(2, Database.getBankCountry() + (String) request.getSession().getAttribute("bankNumber"));
                pstmt.executeUpdate();
                request.getSession().setAttribute("balance", kwotaZlecajacego - kwota);

                pstmt = conn.prepareStatement("INSERT INTO historia (numerZlecajacego, numerOdbiorcy, tytul, nazwa, kwota, data, id_status, type) VALUES (?, ?, ?, ?, ?, ?, 2, 'Zewnetrzny');");
                pstmt.setString(1, Database.getBankCountry() + request.getSession().getAttribute("bankNumber"));
                pstmt.setString(2, Database.getBankCountry() + nrKonta);
                pstmt.setString(3, tytul);
                pstmt.setString(4, odbiorca);
                pstmt.setDouble(5, kwota);
                pstmt.setString(6, data);
                pstmt.executeUpdate();

            } catch (SQLException e) {
                e.printStackTrace();
            }

        }
        return "transfer";
    }

}
