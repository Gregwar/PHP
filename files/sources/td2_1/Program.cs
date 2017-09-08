using System;
using System.IO;
using System.Net;
using System.Net.Sockets;
using System.Text;

class Program
{
    public static void Main()
    {
        TcpListener server = null;
        try
        {
            // Listening on port 8080
            Int32 port = 8080;
            IPAddress localAddr = IPAddress.Parse("127.0.0.1");

            // TcpListener server = new TcpListener(port);
            server = new TcpListener(localAddr, port);

            // Start listening for client requests.
            server.Start();

            // Enter the listening loop.
            while (true)
            {
                Console.Write("Waiting for a connection... ");

                // Perform a blocking call to accept requests.
                // You could also user server.AcceptSocket() here.
                TcpClient client = server.AcceptTcpClient();
                Console.WriteLine("Connected!");

                // Get a stream object for reading and writing
                NetworkStream stream = client.GetStream();

                // Making a stream reader to read lines
                StreamReader reader = new StreamReader(stream);
                StreamWriter writer = new StreamWriter(stream);

                Console.WriteLine("\n>>> Request:\n");
               
                // Loop to receive all the data sent by the client.
                while (client.Connected)
                {
                    string line = reader.ReadLine().Trim();

                    // Translate data bytes to a ASCII string.
                    Console.WriteLine("{0}", line);

                    if (line == "")
                    {
                        Console.WriteLine(">>> Response:\n");

                        // Building the response
                        string response = "";
                        response += "HTTP/1.1 200 OK\r\n";
                        response += "Content-type: text/html\r\n";
                        response += "\r\n";
                        response += "<h1>Hello, time is "+DateTime.Now.ToString("H:m:s")+"!</h1>";

                        // Sending the response and closing the client connection
                        Console.Write(response);
                        writer.Write(response);
                        writer.Flush();
                        client.Close();
                    }
                }

                // Shutdown and end connection
                client.Close();
                Console.WriteLine("\n\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
            }
        }
        catch (SocketException e)
        {
            Console.WriteLine("SocketException: {0}", e);
        }
        finally
        {
            // Stop listening for new clients.
            server.Stop();
        }

        Console.WriteLine("\nHit enter to continue...");
        Console.Read();
    }
}

