#!/usr/bin/env python3
"""
Oceanex Website - Development Server with Clean URL Support
Handles requests without .html extension
"""

import http.server
import socketserver
import os
from urllib.parse import urlparse, unquote

PORT = 8080

class CleanURLHandler(http.server.SimpleHTTPRequestHandler):
    """Custom handler to support clean URLs without .html extension"""
    
    def do_GET(self):
        # Parse the URL
        parsed_path = urlparse(self.path)
        path = unquote(parsed_path.path)
        
        # Remove trailing slash
        if path.endswith('/') and path != '/':
            path = path[:-1]
        
        # Homepage
        if path == '' or path == '/':
            self.path = '/index.html'
            return super().do_GET()
        
        # Check if it's a directory with index.html
        dir_path = '.' + path
        if os.path.isdir(dir_path):
            index_file = os.path.join(dir_path, 'index.html')
            if os.path.exists(index_file):
                self.path = path + '/index.html'
                return super().do_GET()
        
        # Try to find .html file
        html_file = '.' + path + '.html'
        if os.path.exists(html_file) and os.path.isfile(html_file):
            self.path = path + '.html'
            return super().do_GET()
        
        # If file exists as requested (CSS, JS, images), serve it
        direct_file = '.' + path
        if os.path.exists(direct_file) and os.path.isfile(direct_file):
            return super().do_GET()
        
        # 404 - Not Found
        self.send_error(404, f"File not found: {path}")
    
    def end_headers(self):
        # Add CORS headers for development
        self.send_header('Access-Control-Allow-Origin', '*')
        self.send_header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
        self.send_header('Cache-Control', 'no-store, no-cache, must-revalidate')
        return super().end_headers()

def run_server():
    """Start the development server"""
    os.chdir(os.path.dirname(os.path.abspath(__file__)))
    
    with socketserver.TCPServer(("", PORT), CleanURLHandler) as httpd:
        print("🚀 Starting Oceanex Marine Industries Development Server...")
        print("")
        print(f"📍 Server running at: http://localhost:{PORT}")
        print("🔗 Clean URLs enabled (no .html extension needed)")
        print("")
        print("Examples:")
        print("   - http://localhost:8080/")
        print("   - http://localhost:8080/about")
        print("   - http://localhost:8080/news")
        print("   - http://localhost:8080/product/")
        print("")
        print("Press Ctrl+C to stop the server")
        print("")
        print("━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━")
        print("")
        
        try:
            httpd.serve_forever()
        except KeyboardInterrupt:
            print("\n\n🛑 Server stopped")

if __name__ == "__main__":
    run_server()
