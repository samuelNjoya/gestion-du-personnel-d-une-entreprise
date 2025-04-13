
// DOM Elements
const menuToggle = document.getElementById('menuToggle');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
const themeToggle = document.getElementById('themeToggle');
const addTransactionBtn = document.getElementById('addTransactionBtn');
const addTransactionModal = document.getElementById('addTransactionModal');
const closeModal = document.getElementById('closeModal');
const cancelTransaction = document.getElementById('cancelTransaction');
const saveTransaction = document.getElementById('saveTransaction');
const transactionForm = document.getElementById('transactionForm');

// Mobile Menu Toggle
menuToggle.addEventListener('click', () => {
    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');
});

overlay.addEventListener('click', () => {
    sidebar.classList.remove('active');
    overlay.classList.remove('active');
});

// Theme Toggle
themeToggle.addEventListener('click', () => {
    document.body.setAttribute('data-theme', 
        document.body.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');
    
    // Update icon
    const icon = themeToggle.querySelector('i');
    if (document.body.getAttribute('data-theme') === 'dark') {
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
    } else {
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
    }
});

// Transaction Modal
addTransactionBtn.addEventListener('click', () => {
    addTransactionModal.classList.add('active');
});

const closeTransactionModal = () => {
    addTransactionModal.classList.remove('active');
};

closeModal.addEventListener('click', closeTransactionModal);
cancelTransaction.addEventListener('click', closeTransactionModal);
overlay.addEventListener('click', closeTransactionModal);

// Save Transaction
saveTransaction.addEventListener('click', () => {
    // Here you would normally send data to server
    alert('Transaction enregistrée avec succès!');
    closeTransactionModal();
    transactionForm.reset();
});

// Charts
document.addEventListener('DOMContentLoaded', function() {
    // Expenses Chart
    const expensesCtx = document.getElementById('expensesChart').getContext('2d');
    const expensesChart = new Chart(expensesCtx, {
        type: 'doughnut',
        data: {
            labels: ['Nourriture', 'Transport', 'Logement', 'Loisirs', 'Shopping', 'Autre'],
            datasets: [{
                data: [450, 220, 600, 150, 200, 100],
                backgroundColor: [
                    '#FF6384',
                    '#36A2EB',
                    '#FFCE56',
                    '#4BC0C0',
                    '#9966FF',
                    '#FF9F40'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += context.raw + ' €';
                            return label;
                        }
                    }
                }
            },
            cutout: '70%'
        }
    });

    // Income Chart
    const incomeCtx = document.getElementById('incomeChart').getContext('2d');
    const incomeChart = new Chart(incomeCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct'],
            datasets: [{
                label: 'Revenus',
                data: [2200, 2400, 2300, 2500, 2600, 2400, 2700, 2800, 2900, 3000],
                backgroundColor: '#4CC9F0',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.raw + ' €';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false
                    },
                    ticks: {
                        callback: function(value) {
                            return value + ' €';
                        }
                    }
                },
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    }
                }
            }
        }
    });
});

// Animation for cards on scroll
const animateOnScroll = () => {
    const cards = document.querySelectorAll('.stat-card, .chart-card');
    
    cards.forEach(card => {
        const cardPosition = card.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.3;
        
        if (cardPosition < screenPosition) {
            card.classList.add('slide-in');
        }
    });
};

window.addEventListener('scroll', animateOnScroll);
animateOnScroll(); // Run once on load
