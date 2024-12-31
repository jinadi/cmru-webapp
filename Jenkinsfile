pipeline {
    agent any  // Runs on any available agent

    environment {
        DOCKER_IMAGE = 'jinadi/cmru-app'  // The name of your Docker image
        DOCKER_TAG = 'v1.0'  // The Docker tag (could be 'latest' or a version tag)
    }

    stages {
        // Checkout the code from GitHub repository
        stage('Checkout') {
            steps {
                git credentialsId: 'git-pat', url: 'https://github.com/jinadi/cmru-webapp.git'
            }
        }

        // Build the Docker image
        stage('Build Docker Image') {
            steps {
                script {
                    // Building the Docker image using the Dockerfile in the repository
                    sh 'docker build -t ${DOCKER_IMAGE}:${DOCKER_TAG} .'
                }
            }
        }

        // Push the Docker image to DockerHub
        stage('Push to DockerHub') {
            steps {
                script {
                    // Using withCredentials to inject DockerHub credentials securely
                    withCredentials([usernamePassword(credentialsId: 'dockerhub-token', 
                                                       usernameVariable: 'DOCKER_USERNAME', 
                                                       passwordVariable: 'DOCKER_PASSWORD')]) {
                        // Login to DockerHub using the credentials (token as password)
                        sh 'docker login -u $DOCKER_USERNAME -p $DOCKER_PASSWORD'
                        
                        // Push the image to DockerHub
                        sh 'docker push ${DOCKER_IMAGE}:${DOCKER_TAG}'
                    }
                }
            }
        }

        // Optional: Deploy the Docker image (e.g., to a server or container orchestration tool)
        stage('Deploy') {
            steps {
                script {
                    // Pull and run the image (This is just a placeholder)
                    sh 'docker pull ${DOCKER_IMAGE}:${DOCKER_TAG}'
                    sh 'docker run -d ${DOCKER_IMAGE}:${DOCKER_TAG}'
                }
            }
        }
    }

    post {
        always {
            // Clean up workspace after build
            cleanWs()
        }
    }
}
