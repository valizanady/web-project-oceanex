#!/usr/bin/env python3
"""
Image Optimization Script for Oceanex Marine Website
Requires: pip3 install Pillow
"""

import os
import sys
from pathlib import Path

try:
    from PIL import Image
except ImportError:
    print("Installing Pillow...")
    os.system("pip3 install Pillow")
    from PIL import Image

def optimize_image(input_path, max_width=1920, quality=75):
    """Optimize a single image"""
    try:
        with Image.open(input_path) as img:
            # Convert RGBA to RGB for JPEG
            if img.mode in ('RGBA', 'P'):
                img = img.convert('RGB')
            
            # Resize if too large
            if img.width > max_width:
                ratio = max_width / img.width
                new_height = int(img.height * ratio)
                img = img.resize((max_width, new_height), Image.LANCZOS)
            
            # Save with optimization
            img.save(input_path, 'JPEG', quality=quality, optimize=True)
            return True
    except Exception as e:
        print(f"Error optimizing {input_path}: {e}")
        return False

def main():
    base_dir = Path(__file__).parent
    
    # Images to optimize with their settings
    images_config = {
        'images/hero': {'max_width': 1920, 'quality': 70},
        'images/story': {'max_width': 1200, 'quality': 75},
        'images/products': {'max_width': 600, 'quality': 80},
        'images/why': {'max_width': 800, 'quality': 75},
        'images/certifications': {'max_width': 400, 'quality': 80},
    }
    
    total_saved = 0
    
    for folder, config in images_config.items():
        folder_path = base_dir / folder
        if not folder_path.exists():
            continue
            
        print(f"\n📁 Optimizing {folder}...")
        
        for img_file in folder_path.glob('*.jpg'):
            original_size = img_file.stat().st_size
            
            if optimize_image(str(img_file), config['max_width'], config['quality']):
                new_size = img_file.stat().st_size
                saved = original_size - new_size
                total_saved += saved
                
                if saved > 0:
                    print(f"  ✓ {img_file.name}: {original_size/1024:.0f}KB → {new_size/1024:.0f}KB (saved {saved/1024:.0f}KB)")
                else:
                    print(f"  • {img_file.name}: already optimized")
        
        for img_file in folder_path.glob('*.png'):
            original_size = img_file.stat().st_size
            # PNG optimization - just resize, keep format
            try:
                with Image.open(img_file) as img:
                    if img.width > config['max_width']:
                        ratio = config['max_width'] / img.width
                        new_height = int(img.height * ratio)
                        img = img.resize((config['max_width'], new_height), Image.LANCZOS)
                        img.save(img_file, 'PNG', optimize=True)
                        new_size = img_file.stat().st_size
                        saved = original_size - new_size
                        total_saved += saved
                        print(f"  ✓ {img_file.name}: {original_size/1024:.0f}KB → {new_size/1024:.0f}KB")
            except Exception as e:
                print(f"  ✗ {img_file.name}: {e}")
    
    print(f"\n🎉 Total saved: {total_saved/1024/1024:.2f} MB")
    print("\n💡 For even better compression, use:")
    print("   - TinyPNG (https://tinypng.com)")
    print("   - Squoosh (https://squoosh.app)")
    print("   - ImageOptim (for Mac)")

if __name__ == '__main__':
    main()
