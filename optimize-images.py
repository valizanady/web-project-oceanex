#!/usr/bin/env python3
"""
Image Optimization Script for Oceanex Website
Compress images while maintaining quality
Requires: pillow
Install: pip install pillow
"""

import os
from PIL import Image
import sys

def optimize_image(image_path, quality=85, max_width=1920):
    """
    Optimize a single image
    - Compress JPEG/PNG
    - Resize if too large
    - Convert to WebP (optional)
    """
    try:
        with Image.open(image_path) as img:
            # Get original size
            original_size = os.path.getsize(image_path)
            original_width, original_height = img.size
            
            # Skip if already small enough
            if original_size < 200 * 1024:  # Skip if < 200KB
                print(f"✓ Skip (already small): {image_path}")
                return
            
            # Resize if too large
            if original_width > max_width:
                ratio = max_width / original_width
                new_height = int(original_height * ratio)
                img = img.resize((max_width, new_height), Image.Resampling.LANCZOS)
                print(f"  Resized: {original_width}x{original_height} → {max_width}x{new_height}")
            
            # Convert to RGB if RGBA (for JPEG)
            if img.mode in ('RGBA', 'LA', 'P'):
                img = img.convert('RGB')
            
            # Optimize based on format
            if img.format in ['JPEG', 'JPG'] or image_path.lower().endswith(('.jpg', '.jpeg')):
                # Save optimized JPEG with progressive encoding
                img.save(image_path, 'JPEG', quality=quality, optimize=True, progressive=True)
            elif img.format == 'PNG' or image_path.lower().endswith('.png'):
                # Save optimized PNG
                img.save(image_path, 'PNG', optimize=True, compress_level=9)
            
            # Get new size
            new_size = os.path.getsize(image_path)
            saved = original_size - new_size
            percent = (saved / original_size) * 100
            
            print(f"✓ Optimized: {image_path}")
            print(f"  {original_size/1024:.1f}KB → {new_size/1024:.1f}KB (saved {saved/1024:.1f}KB, -{percent:.1f}%)")
            
    except Exception as e:
        print(f"✗ Error processing {image_path}: {e}")

def optimize_directory(directory, extensions=['.jpg', '.jpeg', '.png'], quality=85):
    """
    Optimize all images in a directory recursively
    """
    total_saved = 0
    count = 0
    
    print(f"\n🖼  Optimizing images in: {directory}\n")
    
    for root, dirs, files in os.walk(directory):
        for file in files:
            if any(file.lower().endswith(ext) for ext in extensions):
                image_path = os.path.join(root, file)
                original_size = os.path.getsize(image_path)
                
                optimize_image(image_path, quality=quality)
                
                new_size = os.path.getsize(image_path)
                saved = original_size - new_size
                if saved > 0:
                    total_saved += saved
                    count += 1
    
    print(f"\n✅ Done! Optimized {count} images")
    print(f"💾 Total saved: {total_saved/1024/1024:.2f}MB\n")

if __name__ == "__main__":
    # Check if Pillow is installed
    try:
        from PIL import Image
    except ImportError:
        print("❌ Error: Pillow not installed")
        print("Install with: pip install pillow")
        sys.exit(1)
    
    # Optimize images directory
    images_dir = "images"
    
    if not os.path.exists(images_dir):
        print(f"❌ Directory not found: {images_dir}")
        sys.exit(1)
    
    # Run optimization
    optimize_directory(
        directory=images_dir,
        extensions=['.jpg', '.jpeg', '.png'],
        quality=85  # 85 = high quality with good compression
    )
    
    print("🎉 Image optimization complete!")
    print("\n📝 Recommendations:")
    print("   - Consider converting images to WebP format for better compression")
    print("   - Use lazy loading for below-the-fold images")
    print("   - Implement responsive images with srcset")
