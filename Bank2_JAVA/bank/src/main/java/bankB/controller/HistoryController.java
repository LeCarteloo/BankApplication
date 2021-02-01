package bankB.controller;

import bankB.Database;
import bankB.Transfer;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpSession;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

@Controller
public class HistoryController {

    @GetMapping("/history")
    public String showHistory(HttpServletRequest request, Model model) {
        HttpSession session = request.getSession(false);
        if(session == null)
        {
            return "index";
        }
        try{
            Connection conn = Database.getConnection();
            PreparedStatement pstmt = conn.prepareStatement("SELECT * FROM historia WHERE numerZlecajacego=? OR numerOdbiorcy=?");
            pstmt.setString(1, Database.getBankCountry() + (String) request.getSession().getAttribute("bankNumber"));
            pstmt.setString(2, Database.getBankCountry() + (String) request.getSession().getAttribute("bankNumber"));
            List<Transfer> list = new ArrayList<Transfer>();
            ResultSet rs = pstmt.executeQuery();
            while(rs.next()){
                Transfer transfer = new Transfer();
                transfer.setData(rs.getDate(7));
                transfer.setTytul(rs.getString(4));
                transfer.setOdbiorca(rs.getString(5));
                transfer.setNrKonta(rs.getString(3).substring(2));
                transfer.setKwota(rs.getDouble(6));
                list.add(transfer);
            }
            model.addAttribute("transfers", list);
        }catch(SQLException e){
            e.printStackTrace();
        }

        return "history";
    }

}
