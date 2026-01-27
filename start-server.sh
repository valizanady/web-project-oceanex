#!/bin/bash
# Oceanex Website - Development Server Launcher
# Supports clean URLs without .html extension

echo "🚀 Starting Oceanex Marine Industries Development Server..."
echo ""
echo "📍 Server will run at: http://localhost:8080"
echo "🔗 Clean URLs enabled (no .html extension needed)"
echo ""
echo "Examples:"
echo "   - http://localhost:8080/"
echo "   - http://localhost:8080/about"
echo "   - http://localhost:8080/news"
echo "   - http://localhost:8080/product/"
echo ""
echo "Press Ctrl+C to stop the server"
echo ""
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
echo ""

# Change to website directory
cd "$(dirname "$0")"

# Start PHP built-in server with router
php -S localhost:8080 router.php
