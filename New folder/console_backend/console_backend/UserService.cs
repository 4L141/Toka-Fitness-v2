using System;
using BCrypt.Net;
using MySql.Data.MySqlClient;
using Org.BouncyCastle.Crypto.Generators;

namespace ConsoleBackend
{
    public static class UserService
    {
        public static Response Register(Request req)
        {
            try
            {
                using (var conn = Database.GetConnection())
                {
                    var checkCmd = new MySqlCommand("SELECT COUNT(*) FROM users WHERE email=@email", conn);
                    checkCmd.Parameters.AddWithValue("@email", req.email);
                    int exists = Convert.ToInt32(checkCmd.ExecuteScalar());
                    if (exists > 0)
                        return new Response { Status = "error", Message = "Email address already exists" };

                    string hashed = BCrypt.Net.BCrypt.HashPassword(req.password);

                    var cmd = new MySqlCommand("INSERT INTO users (first_name, last_name, email, password, reg_date) VALUES (@first_name, @last_name, @email, @password, NOW())", conn);
                    cmd.Parameters.AddWithValue("@first_name", req.first_name);
                    cmd.Parameters.AddWithValue("@last_name", req.last_name);
                    cmd.Parameters.AddWithValue("@email", req.email);
                    cmd.Parameters.AddWithValue("@password", hashed);
                    cmd.ExecuteNonQuery();

                    return new Response { Status = "success", Message = "Registration successful" };
                }
            }
            catch (Exception ex)
            {
                return new Response { Status = "error", Message = ex.Message };
            }
        }

        public static Response Login(Request req)
        {
            try
            {
                using (var conn = Database.GetConnection())
                {
                    var cmd = new MySqlCommand("SELECT user_id, email, password, is_admin FROM users WHERE email=@email", conn);
                    cmd.Parameters.AddWithValue("@email", req.email);
                    var reader = cmd.ExecuteReader();

                    if (!reader.Read())
                        return new Response { Status = "error", Message = "User not found" };

                    string storedHash = reader.GetString("password");
                    if (!BCrypt.Net.BCrypt.Verify(req.password, storedHash))
                        return new Response { Status = "error", Message = "Incorrect password" };

                    return new Response
                    {
                        Status = "success",
                        Message = "Login successful",
                        User = new UserData
                        {
                            user_id = reader.GetInt32("user_id"),
                            email = reader.GetString("email")
                        }
                    };
                }
            }
            catch (Exception ex)
            {
                return new Response { Status = "error", Message = ex.Message };
            }
        }


        public static Response GetUsers()
        {
            try
            {
                using (var conn = Database.GetConnection())
                {
                    var cmd = new MySqlCommand("SELECT user_id, first_name, last_name, email, password, reg_date, is_admin FROM users", conn);
                    var reader = cmd.ExecuteReader();

                    var users = new List<Dictionary<string, object>>();

                    while (reader.Read())
                    {
                        users.Add(new Dictionary<string, object>
                        {
                            { "user_id", reader["user_id"] },
                            { "first_name", reader["first_name"] },
                            { "last_name", reader["last_name"] },
                            { "email", reader["email"] },
                            { "password", reader["password"] },
                            { "reg_date", reader["reg_date"] },
                            { "is_admin", reader["is_admin"] }
                        });
                    }

                    public static Response UpdateUser(Request req)
                    {
                        try
                        {
                            using (var conn = Database.GetConnection())
                            {
                                var cmd = new MySqlCommand("UPDATE users SET first_name=@first_name, last_name=@last_name, email=@email WHERE user_id=@id", conn);
                                cmd.Parameters.AddWithValue("@first_name", req.first_name);
                                cmd.Parameters.AddWithValue("@last_name", req.last_name);
                                cmd.Parameters.AddWithValue("@email", req.email);
                                cmd.Parameters.AddWithValue("@id", req.user_id);
                                int rows = cmd.ExecuteNonQuery();

                                if (rows > 0)
                                    return new Response { Status = "success", Message = "User updated successfully" };
                                else
                                    return new Response { Status = "error", Message = "No user found to update" };
                            }
                        }
                        catch (Exception ex)
                        {
                            return new Response { Status = "error", Message = ex.Message };
                        }
                    }

                    public static Response DeleteUser(Request req)
                    {
                        try
                        {
                            using (var conn = Database.GetConnection())
                            {
                                var cmd = new MySqlCommand("DELETE FROM users WHERE user_id=@id", conn);
                                cmd.Parameters.AddWithValue("@id", req.user_id);
                                int rows = cmd.ExecuteNonQuery();

                                if (rows > 0)
                                    return new Response { Status = "success", Message = "User deleted successfully" };
                                else
                                    return new Response { Status = "error", Message = "No user found to delete" };
                            }
                        }
                        catch (Exception ex)
                        {
                            return new Response { Status = "error", Message = ex.Message };
                        }
                    }


                    return new Response
                    {
                        Status = "success",
                        Message = "Users retrieved successfully",
                        User = null,
                        // add a new property in Response if needed (like UsersList)
                    };
                }
            }
            catch (Exception ex)
            {
                return new Response { Status = "error", Message = ex.Message };
            }
        }

    }
}

