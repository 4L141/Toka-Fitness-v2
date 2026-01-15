using System;
using System.IO;
using Newtonsoft.Json;

namespace ConsoleBackend
{
    class Program
    {
        static void Main(string[] args)
        {
            // Test database connection BEFORE anything else
            try
            {
                using (var conn = Database.GetConnection())
                {
                    Console.WriteLine("Connection to MySQL successful!");
                }
            }
            catch (Exception ex)
            {
                Console.WriteLine("Connection failed: " + ex.Message);
                return; // Important fix
            }

            // Usage check
            if (args.Length < 2)
            {
                Console.WriteLine("Usage: console_backend.exe <input.json> <output.json>");
                return;
            }

            string inputPath = args[0];
            string outputPath = args[1];

            if (!File.Exists(inputPath))
            {
                Console.WriteLine("Request file not found!");
                return;
            }

            try
            {
                string jsonRequest = File.ReadAllText(inputPath);
                Request request = JsonConvert.DeserializeObject<Request>(jsonRequest);

                Response response;

                switch (request.Action.ToLower())
                {
                    case "register":
                        response = UserService.Register(request);
                        break;

                    case "login":
                        response = UserService.Login(request);
                        break;

                    case "get_users":
                        response = UserService.GetUsers();
                        break;

                    case "update_user":
                        response = UserService.UpdateUser(request);
                        break;

                    case "delete_user":
                        response = UserService.DeleteUser(request);
                        break;

                    default:
                        response = new Response { Status = "error", Message = "Unknown action" };
                        break;
                }

                string jsonResponse = JsonConvert.SerializeObject(response, Formatting.Indented);
                File.WriteAllText(outputPath, jsonResponse);

                Console.WriteLine($"Processed {request.Action} successfully");
            }
            catch (Exception ex)
            {
                var errorResponse = new Response { Status = "error", Message = ex.Message };
                File.WriteAllText(outputPath, JsonConvert.SerializeObject(errorResponse, Formatting.Indented));
                Console.WriteLine("An error occurred: " + ex.Message);
            }
        }
    }
}
