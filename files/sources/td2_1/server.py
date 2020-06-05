import socket
import socketserver
import datetime


class WebServer(socketserver.BaseRequestHandler):
    def handle(self):
        client = self.request
        io = client.makefile()

        # Receiving client commands line per line
        print('> Request: ')
        receivingHeaders = True
        while receivingHeaders:
            line = io.readline().strip()
            print(line)
            if line == '':
                receivingHeaders = False

        # Creating a response for the client
        print('> Response: ')
        response = "HTTP/1.1 200 OK\r\n"
        response += "Content-type: text/html\r\n"
        response += "\r\n"
        response += datetime.datetime.now().strftime('%H:%M:%S')

        print(response)
        client.sendall(response.encode('utf-8'))


HOST, PORT = "127.0.0.1", 8080
socketserver.TCPServer.allow_reuse_address = True
with socketserver.TCPServer((HOST, PORT), WebServer) as server:
    server.serve_forever()
