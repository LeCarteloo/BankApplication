package bankB.controller;

import bankB.Database;
import bankB.User;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import javax.servlet.http.HttpServletRequest;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

@Controller
public class MainController {

    @GetMapping("/")
    public String showIndex(HttpServletRequest request) {

        request.getSession().setAttribute("bladLogowania", false);
        return "index";
    }

    @GetMapping("/historia")
    public String showForm(HttpServletRequest request) {
try{
    Connection conn = Database.getConnection();
    PreparedStatement pstmt = conn.prepareStatement("SELECT * FROM historia WHERE numerPrzychodzacy=? OR numerWychodzacy=?");
    pstmt.setString(1, (String) request.getSession().getAttribute("bankNumber"));
    pstmt.setString(2, (String) request.getSession().getAttribute("bankNumber"));

    ResultSet rs = pstmt.executeQuery();
}catch(SQLException e){
    e.printStackTrace();
}

        return "historia";
    }

    @PostMapping("/login")
    public String submitForm(@RequestParam("login") String login, @RequestParam("password") String password, HttpServletRequest request) {

        try {
            Connection conn = Database.getConnection();
            PreparedStatement pstmt = conn.prepareStatement("SELECT * FROM user WHERE login=? AND password=?");
            pstmt.setString(1, login);
            pstmt.setString(2, password);

            ResultSet rs = pstmt.executeQuery();
            request.getSession().setAttribute("isLogged", false);
            rs.last();
            if (rs.getRow() == 1) {
                rs.first();
                request.getSession().setAttribute("isLogged", true);
                request.getSession().setAttribute("name", rs.getString(2));
                request.getSession().setAttribute("surname", rs.getString(3));
                request.getSession().setAttribute("bankNumber", rs.getString(13));
                request.getSession().setAttribute("balance", rs.getDouble(14));
                request.getSession().setAttribute("bladLogowania", false);
                return "zalogowany";
            }
            else{
                request.getSession().setAttribute("bladLogowania", true);
            }
        }catch(SQLException e) {
            e.printStackTrace();
        }
        return "index";
    }

}