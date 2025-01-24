let currentItem = null;

function showItem(itemId) {
    const animations = ['fade-in', 'slide-in', 'zoom-in'];
    const randomAnimation = animations[Math.floor(Math.random() * animations.length)];

    if (currentItem && currentItem.id !== itemId) {
        currentItem.style.display = 'none';
        currentItem.classList.remove('fade-in', 'slide-in', 'zoom-in');
    }

    const item = document.getElementById(itemId);
    item.style.display = 'block';
    item.classList.add(randomAnimation);
    currentItem = item;
}

function activateItemFromHash() {
    const hash = window.location.hash;
    const currentUrl = window.location.href;
    const targetUrl = 'http://localhost/event_management_system/back_end/index.php#list-item-1';
    const listItem = document.getElementById('list-item-1');

    if (currentUrl !== targetUrl && listItem) {
        
        listItem.style.display = 'none';
    }

    if (hash) {
        const itemId = hash.substring(1);
        showItem(itemId);
    } else {
        const firstAnchor = document.querySelector('a');
        if (firstAnchor) {
            const firstItemId = firstAnchor.getAttribute('href').substring(1);
            showItem(firstItemId);
        }
    }
}

if (window.innerWidth <= 768) {
    document.querySelectorAll('a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                });
                showItem(targetId);
            }
        });
    });
}

window.addEventListener('load', activateItemFromHash);
window.addEventListener('hashchange', activateItemFromHash);