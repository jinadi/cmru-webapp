pipeline {
    agent any

    environment {
        DOCKER_IMAGE = 'jinadi/cmru-app'
        DOCKER_TAG = 'v1.0'
    }

    stages {
        stage('Checkout') {
            steps {
                git 'https://github.com/jinadi/cmru-webapp.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    sh 'docker build -t ${DOCKER_IMAGE}:${DOCKER_TAG} .'
                }
            }
        }

        stage('Push to DockerHub') {
            steps {
                script {
                    withCredentials([usernamePassword(dockerhub-token: 'dockerhub-credentials', dckr_pat_uZWYcl9ErGn_tYjK1TY1U73h9sA: 'DOCKER_PASSWORD', jinadi: 'DOCKER_USERNAME')]) {
                        sh 'docker login -u $DOCKER_USERNAME -p $DOCKER_PASSWORD'
                        sh 'docker push ${DOCKER_IMAGE}:${DOCKER_TAG}'
                    }
                }
            }
        }

        stage('Deploy') {
            steps {
                script {
                    // Pull the Docker image to deploy
                    sh 'docker pull ${DOCKER_IMAGE}:${DOCKER_TAG}'
                    // Add deploy command (e.g., docker run or kubectl apply depending on your environment)
                    sh 'docker run -d ${DOCKER_IMAGE}:${DOCKER_TAG}'
                }
            }
        }
    }

    post {
        always {
            cleanWs()
        }
    }
}
