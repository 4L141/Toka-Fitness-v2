using System;
using System.IO;

namespace ConsoleBackend
{
    public static class Logger
    {
        private static readonly string logFilePath = Path.Combine(AppDomain.CurrentDomain.BaseDirectory, "backend_log.txt");

        public static void Log(string message)
        {
            try
            {
                File.AppendAllText(logFilePath, $"{DateTime.Now}: {message}{Environment.NewLine}");
            }
            catch (Exception ex)
            {
                Console.WriteLine($"Failed to write to log file: {ex.Message}");
            }
        }
    }
}
